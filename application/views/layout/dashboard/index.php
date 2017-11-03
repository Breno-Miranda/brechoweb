
<!DOCTYPE html>
<html lang="pt">
<head>
<title><?= $titulo ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://fonts.googleapis.com/css?family=Raleway|Space+Mono" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>public/icone/icon32x32.png" sizes="32x32" />
    <link rel="icon" href="<?= base_url() ?>public/icone/icon32x32.png" sizes="192x192" />

<link rel="stylesheet" href="<?= base_url() ?>/public/css/dashboard.css">
<?php foreach ($layout as $lay): ?>
<?php $dados = strval($lay->tabelas); ?>
<?php if ($lay->tb_Posicao == "dashboard-header-meta"): ?>
<?php foreach ($data[$dados] as $result):?>
<meta name="keywords" content="<?= $result->palavras_chaves	; ?>">
<meta name="author" content="<?= $result->autor; ?>">
<?php endforeach ?>	
<?php endif ?>
<?php endforeach ?>
</head>
<body>

<div class="container-fluid header">
<div class="container">
<div class="row">
<?php foreach ($layout as $lay): ?>
<?php $dados = strval($lay->tabelas); ?>
<?php if ($lay->tb_Posicao == "dashboard-header"): ?>
<div class="col-xs-12 col-md-3">
<?php foreach ($data[$dados] as $result):?>
<a href="<?= BaseController(null , null , null , 'dashboard');  ?>" class="logo"><img src="<?= $result->imagem ?>" width="100"></a>
<a href="#" id="menu-rolar" class="icone-menu-mobile">Menu</a>
<?php endforeach ?> 
</div>
<?php endif ?>
<?php endforeach ?>

<?php foreach ($layout as $lay): ?>
<?php $dados = strval($lay->tabelas); ?>
<?php if ($lay->tb_Posicao == "dashboard-header-menu"): ?>
<div id="menu" class="col-xs-10 col-md-9 header-menu">
<ul class="nav nav-pills">
<li role="presentation" title="sair"><a href="<?= BaseController(null , null , null ,'dashboard') ?>">Dashboard</a></li>
<?php foreach ($data[$dados] as $result):?>
<li role="presentation" title="<?= $result->title ?>"><a href="<?= BaseController(null , $result->link , null, 'dashboard') ?>"><?= $result->slug ?></a></li>
<?php endforeach ?> 
<li role="presentation" title="sair"><a href="<?= BaseController(null , 'site' , 'sair' , 'dashboard') ?>">Sair</a></li>
</ul>
<?php endif ?>
<?php endforeach ?>
</div>
</div>
</div>
</div>


<div class="container main">
<div class="row">

<?php foreach ($layout as $lay): ?>
<?php if ($lay->tb_Posicao == "dashboard-header"): ?>
<?php if ($lay->notificacao != 'null'): ?>
<div class="alert alert-warning" role="alert"><?= $lay->notificacao ?></div>
<?php endif ?>
<?php endif ?>
<?php endforeach ?> 
<?php $this->load->view($pagina); ?>
</div>
</div>


<div class="container-fluid footer">
<div class="row">
<div class="container footer">
    <?php foreach ($layout as $lay): ?>
        <?php $dados = strval($lay->tabelas); ?>
        <?php if ($lay->tb_Posicao == "dashboard-footer-links"): ?>
            <div class="col-xs-6 col-md-6">
                <ul class="nav nav-pills dashboard-footer-links">
                <?php foreach ($data[$dados] as $result):?>
                        <li role="presentation" class=""><a href="<?= BaseController(null , $result->link , null, 'dashboard') ?>"><?= $result->slug?></a></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    <?php endforeach ?>
    <?php foreach ($layout as $lay): ?>
        <?php $dados = strval($lay->tabelas); ?>
        <?php if ($lay->tb_Posicao == "dashboard-footer-info-pagamento"): ?>
            <div class="col-xs-6 col-md-6">
                <ul class="nav nav-pills dashboard-footer-links">
                <?php foreach ($data[$dados] as $result):?>
                        <li role="presentation" class=""><a href="<?= $result->link ?>" >  <img src="<?= $result->imagem?>" alt="<?= $result->slug ?>" width="50" title="<?= $result->slug ?>"></a></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
</div>
</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/script.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="<?= base_url() ?>/public/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>