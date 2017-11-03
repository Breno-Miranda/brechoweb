<!DOCTYPE html>
<html lang="pt">
<head>
    <script src="<?= base_url('public/site/js/bootstrap.js') ?>"></script>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    
    <title><?= $titulo ?></title>
    
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('public/site/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/site/css/main.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <header>
                <div class="row">
                    <div class="navbar">
                        <div class="navbar-header">
                            <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="<?= base_url('') ?>">Risol Baby</a>
                        </div>

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="<?= base_url('sobre') ?>">Sobre</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('blogs') ?>">Blogs</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('redesocial') ?>">Redes Sociais</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('contato') ?>">Contato</a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav social">
                                      <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                      <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                      <li><a href="#"> <i class="fa fa-github"></i> </a> </li>  
                                      <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                      <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </div><!-- /.navbar -->
                </div>
                

              

            </header>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <?php if($this->session->flashdata('flashdata')): ?>
                    <div class="alert alert-<?= ($this->session->flashdata('flashdata')['status']) ?>" role="alert"><?= ($this->session->flashdata('flashdata')['msm']) ?></div>
                  <?php endif; ?>
              </div>
            </div>

             <div class="container">
              <div class="col-md-12 col-lg-12">
                <?php $this->load->view($pagina) ?>
              </div>
            </div>

            <div class="row grid-list-wrapper no-gutter-space" id="shots"></div>
         </div>
    </div>

    <footer>
        <div class="container">
            <nav class="nav-footer">
                 <ul>
                      <li>
                          <a href="#">Sobre</a>
                      </li>

                      <li>
                          <a href="#">Blog</a>
                      </li>

                      <li>
                          <a href="#">Redes</a>
                      </li>

                      <li>
                          <a href="#">Contato</a>
                      </li>
                  </ul>

                  <ul>
                      <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                      <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                      <li><a href="#"> <i class="fa fa-github"></i> </a> </li>  
                      <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                      <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                  </ul>

                <p class="credits text-center">&copy; All Rights Risol baby</p>
            </nav>
        </div>

    </footer>
</body>
</html>