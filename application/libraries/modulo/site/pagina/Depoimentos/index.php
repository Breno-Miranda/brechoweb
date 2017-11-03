<div class="container-fluid main">
<div class="container">
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-body">
<?php foreach ($layout as $lay): ?>
<?php $dados = strval($lay->tabelas); ?>
<?php if ($lay->tb_Posicao == "main-depoimentos"): ?>
<h2><?= $lay->titulo ?></h2>
<p><?= $lay->texto ?></p>
<?php if ($lay->notificacao != 'null'): ?>
            <?php $_SESSION['Mensagem_flash'] = $lay->notificacao ; //endforeach  ?>
<?php endif ?>

<?php endif ?>
<?php endforeach ?>	
<?php foreach ($layout as $lay): ?>
<?php $dados = strval($lay->tabelas); ?>
<?php if ($lay->tb_Posicao == "main-depoimentos"): ?>
<div class="row">
<?php foreach ($data[$dados] as $result):?>
<div class="col-xs-6 col-md-3">
<div class="caption">
<h3 class="text-center"><?= $result->descricao ?></h3>
</div>
</div>
<?php endforeach ?>
</div>
<?php endif ?>
<?php endforeach ?>
</div>
</div>
</div>
</div>
</div>