<?php
/**
 * Plugin Name:       Tracked Button CLI Reports
 * Description:       Este plugin implementa comandos para WP CLI, disponibilizando a exibição de dados armazenados no related plugin Tracked Button
 * Version:           0.0.1
 * Requires at least: 5.6
 * Author:            André F. Vigarani
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       tracked-button-reports
 *
 * @package         Tracked_Button-Reports
 */

if (!defined('ABSPATH')) exit;

class Tracked_Button_Reports {

    public function __construct() {
        // Adiciona o comando WP-CLI
        if (defined('WP_CLI') && WP_CLI) {
            WP_CLI::add_command('listar_cliques', array($this, 'listClicks'));
        }
    }

    public function listClicks($args, $assoc_args) {
        global $wpdb;

        // Obtém o ID do botão do argumento passado
        $button_id = isset($args[0]) ? $args[0] : '';

        $table_name = $wpdb->prefix . 'tracked_clicks';

        // Constrói a consulta SQL com base no ID do botão, se fornecido
        $sql = "SELECT * FROM $table_name";
        if (!empty($button_id)) {
            $sql .= " WHERE button_id = %s";
            $sql = $wpdb->prepare($sql, $button_id);
        }

        // Obtém os cliques registrados no banco de dados
        $results = $wpdb->get_results($sql);

        // Exibe os resultados no console
        if ($results) {
            WP_CLI::success("Cliques Registrados:");
            foreach ($results as $data) {
                WP_CLI::line("Botão ID: {$data->button_id}, Data e Hora: {$data->click_datetime}");
            }
        } else {
            WP_CLI::warning("Nenhum clique registrado.");
        }
    }
}

// Inicializa o plugin
$tracked_button_reports = new Tracked_Button_Reports();
