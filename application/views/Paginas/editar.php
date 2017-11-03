
<!-- 	
<?php echo'<pre>'; ?>
<?php print_r($dados); ?>
<?php echo'</pre>'; ?>
<?php echo'<pre>'; ?>
<?php print_r($campos); ?>
<?php echo'</pre>'; ?>
 -->

<div class="panel panel-default">
<div class="panel-body">
<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="<?= BaseController(null , null) ?>">Inicio</a></li>
  <li><a href="<?= BaseController($classe , null) ?>"><?= $classe ?></a></li>
  <li class="active"><?= $titulo ?></li>
</ol>
<?= form_open_multipart($action) ?>
	<?php foreach ($campos as $resultCampos): ?> 
		<?php  $_dados = strval($resultCampos->name); //CONVERTENDO ARRAY PRA STRING ?> 
		<?php foreach ($dados as $resultData): //CONTEUDO DO BANCO ?>
		<?php //print_r($campos); ?>
		<?php echo form_error($resultCampos->name); ?>
		<!-- <div class="col-xs-6 col-md-4"> -->
		<div class="form-group">
		<?php if ($resultCampos->type == "varchar" && $resultCampos->default != 'FILE' && $resultCampos->default != 'SENHA'): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_input(array('name'=> $resultCampos->name , 'class' => 'form-control' , 'value' => $resultData->$_dados));  ?>
		<?php elseif($resultCampos->primary_key == 1): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<input class="form-control" id="disabledInput" type="text" placeholder="<?=$resultData->$_dados ?>" disabled>
		<?php elseif($resultCampos->type == "int" && $resultCampos->default != 1): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_input(array('name'=> $resultCampos->name, 'class' => 'form-control' , 'value' => $resultData->$_dados));  ?>
		<?php elseif($resultCampos->type == "float" && $resultCampos->default != 1): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_input(array('name'=> $resultCampos->name, 'class' => 'form-control' , 'value' => $resultData->$_dados));  ?>
		<?php elseif($resultCampos->type == "decimal" && $resultCampos->default != 1): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_input(array('name'=> $resultCampos->name, 'class' => 'form-control' , 'value' => $resultData->$_dados));  ?>
		<?php elseif($resultCampos->type == "longtext"): ?>	
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_textarea(array('id'=>'text' , 'name'=> $resultCampos->name, 'class' => 'form-control', 'value' => $resultData->$_dados));  ?>
		<?php elseif($resultCampos->default == 1 && $resultCampos->name != "timestamp"): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?php $campoDrop = strval($resultCampos->name); ?>
			<?= form_dropdown(array('name'=> $resultCampos->name, 'class' => 'form-control' ) , $$campoDrop );  ?>
		<?php elseif($resultCampos->default == 'SENHA' && $resultCampos->name != "timestamp" && $resultCampos->type == "varchar" ): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_password(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
		<?php elseif($resultCampos->default == 'RADIO'): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_radio(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
		<?php elseif($resultCampos->default == 'FILE' && $resultCampos->type == "varchar"): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_upload(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
		<?php elseif($resultCampos->type == "timestamp"): ?>
			<?= form_label(_string($resultCampos->name));  ?>
			<?= form_input(array('name'=> $resultCampos->name,'value'=>date("Y-m-d H:i:s") ,'class' => 'form-control'));  ?>
		<?php endif ?>
		</div>
		<!-- </div> -->
	<?php endforeach ?>
	<?php endforeach ?>
<?= form_submit(array('value' => $titulo)) ?>
<?= form_close() ?>
</div>
</div>
</div>
</div>