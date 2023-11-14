# Tracked Button CLI Reports

**Requires PHP:** 5.6
**Stable tag:** 0.0.1
**License:** GPLv2 or later
**Author:** André F. Vigarani
**License URI:** [GPL-3.0](https://www.gnu.org/licenses/gpl-3.0.html)

## Comando WP-CLI

Comando para listar cliques registrados no console.

   ```bash
   wp tb_listar_cliques [id-do-botao]
   ```
Comando para mostrar totalizadores de cliques registrados.

   ```bash
   wp tb_total_cliques [id-do-botao]
   ```

 [id-do-botao] (opcional): Fornecer o ID do botão para filtrar os cliques registrados por botão.

## Instalação

1. Faça o download ou clone este repositório para o diretório `wp-content/plugins/` no seu site WordPress.

   ```bash
   git clone https://github.com/andrevigarani/TrackedButtonReports.git

2. Caso queira ativar o plugin via CLI.

   ```bash
   wp plugin activate tracked-button-reports
   ```
