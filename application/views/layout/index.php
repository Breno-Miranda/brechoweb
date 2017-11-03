<div class="panel panel-default">
  <div class="panel-body">
   	<div class="row">
   	<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="<?= BaseController(null , null) ?>">Inicio</a></li>
  <li class="active"><?= _string($classe) ?></li>
</ol>
<ul class="nav nav-pills">
  <li role="presentation" class=""><a href="<?= base_url("index.php/painel/$classe/salvar") ?>">NOVO</a></li>
</ul>
<div class="table-responsive">
<table class="table table-striped">
	<tr>
	<?php  foreach ($campos as $resultCamposTable): ?>
			<td><?= _string($resultCamposTable->name); ?></td>

	<?php endforeach;   ?>


	<td>Ações</td>
	</tr>
	
<?php foreach ($dados as $resultData): //CONTEUDO DO BANCO ?>
		<tr>

		<?php foreach ($campos as $resultCampos): // CAMPOS DA TABELA DESEJADA  ?>


			<?php  $_dados = strval($resultCampos->name); //CONVERTENDO ARRAY PRA STRING ?> 

					<td><?= $resultData->$_dados; ?></td>

				<?php //print_r($resultData); ?>
		<?php endforeach ?>
		<td>
		<a href="<?= base_url("index.php/painel/$classe/editar/".$resultData->id) ?>"><span class="glyphicon  glyphicon-pencil" aria-hidden="true"></span></a>
		<a href="<?= base_url("index.php/painel/$classe/deletar/".$resultData->id) ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		</td>
		</tr>
	<?php endforeach ?>
</table>
</div>
</div>
</div>
</div>
</div>