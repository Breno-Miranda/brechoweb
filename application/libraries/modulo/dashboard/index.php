
<?php foreach ($layout as $lay): ?>
<?php $dados = strval($lay->tabelas); ?>
<?php if ($lay->tb_Posicao == "dashboard-header"): ?>
<div class="col-md-12" style="padding: 2%; margin-bottom:2%;">
<p><?= $lay->titulo ?></p>
</div>
<?php endif ?>
<?php endforeach ?>