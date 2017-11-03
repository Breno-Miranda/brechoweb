
<div class="row">
	<?php foreach ($dados_view_padrao as $result_menu): ?>
	  <a style="width: 30%; height: 150px; background: darkslategrey; " href="<?= BaseController($result_menu->slug , null, null, 'painel') ?>" class="button radius"><i class="<?= $result_menu->tb_icone ?>"><br> <?= $result_menu->slug ?></i></a>
	<?php endforeach ?>
</div>
