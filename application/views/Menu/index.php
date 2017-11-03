<?php foreach ($dados_view_padrao as $result_menu): ?>
<a  href="<?= BaseController($result_menu->slug , null, null, 'painel') ?>" 
	class="menu">
	<i class="<?= $result_menu->tb_icone ?>"></i><p><strong><?= $result_menu->slug ?></strong></p>
</a>
<?php endforeach ?>


