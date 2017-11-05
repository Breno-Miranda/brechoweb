<!DOCTYPE html>
<html>
  <head>
    <title><?= $titulo ?></title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('public/css/photon.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css')?>">

    <!-- Javascript -->
    <script src="<?= base_url('public/js/menu.js')?>" charset="utf-8"></script>
    <script src="https://use.fontawesome.com/2bd7e1b774.js"></script>
  </head>
  <body>
    <div class="window">

      <!-- .toolbar-header sits at the top of your app -->
      <header class="toolbar toolbar-header">
        <h1 class="title"><?= $titulo ?></h1>
        <div class="toolbar-actions">
          <div class="btn-group">
            <a  href="<?= BaseController(null , null) ?>" class="btn btn-default">
              <span class="icon icon-home"></span>
            </a>
            <a class="btn btn-default" href="<?= BaseController($c_class, null)?>">
             <span class="icon icon-folder"></span>
            </a>
            <a  href="<?= BaseController('pagamento' , null) ?>" class="btn btn-default active">
              <span class="icon icon-cc-nc"></span>
            </a>
            <a  href="<?= BaseController('download' , null) ?>" class="btn btn-default">
              <span class="icon icon-download"></span>
            </a>
            <a  href="<?= BaseController('permissao' , null) ?>" class="btn btn-default">
              <span class="icon icon-lock"></span>
            </a>
          </div>
            <a  href="<?= base_url() ?>" target="_blanck" class="btn btn-default">
            <span class="icon icon-globe"></span> 
                  Ver Site
            </a>
            <a href="<?= BaseController($c_class , 'salvar' , null , 'painel') ?>" 
            class="btn btn-default  pull-right">
              <span class="icon icon-plus-circled"></span>
            </a>
        </div>
      </header>

      <div class="window-content">
        <div class="pane-group">
          <div class="pane pane-sm sidebar">
            <nav class="nav-group">
              <h5 class="nav-group-title">Favorites</h5>

              <a href="<?= base_url('painel')?>" class="nav-group-item">
                <span class="icon icon-home"></span>
                  Home
              </a>
              <a href="<?= base_url('painel/sair')?>" class="nav-group-item">
                <span class="icon icon-moon"></span>
                Sair
              </a>


              <h5 class="nav-group-title">Redesocial</h5>

              <a href="<?= base_url('painel/redesocial/facebook')?>" class="nav-group-item">
                <span class="icon icon-home"></span>
                  Facebook
              </a>
              <a href="<?= base_url('painel/redesocial/instagram')?>" class="nav-group-item">
                <span class="icon icon-monitor"></span>
                  Instagram
              </a>
              <a href="<?= base_url('painel/redesocial/twitter')?>" class="nav-group-item">
                <span class="icon icon-monitor"></span>
                  Twitter
              </a>
            </nav>
          </div>

          <div class="pane">
            <?php $this->load->view($pagina) ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
