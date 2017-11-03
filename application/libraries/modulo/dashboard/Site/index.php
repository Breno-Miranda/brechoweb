
<?php foreach ($layout as $lay): ?>
    <?php $dados = strval($lay->tabelas); ?>
    	<?php if ($lay->tb_Posicao == "dashboard-header-menu"): ?>
        	<div class="col-md-3" >
            	<div class="main-menu-icone">
                	<ul class="nav nav-pills">
                	<?php foreach ($data[$dados] as $result):?>
                      <li><a title="<?= $result->title ?>" href="<?= BaseController(null,$result->link , null ,'dashboard') ?>"><img src="<?= $result->link_icone ?>"> <p><?= $result->slug ?></p></a></li>
               		 <?php endforeach ?>
                </ul>
            </div>
        </div>
    <?php endif ?>
<?php endforeach ?>

<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-body">
				<?php foreach ($layout as $lay): ?>
					<?php $dados = strval($lay->tabelas); ?>
						<?php if ($lay->tb_Posicao == "dashboard-header"): ?>
						<div class="col-md-12" style="padding: 2%; margin-bottom:2%;">
						<p><?= $lay->titulo ?></p>
						<h4><?= $lay->texto ?></h4>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>


