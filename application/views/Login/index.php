<style type="text/css">
	.main{ margin: auto; width: 80%; background: #fff;  padding: 10px; margin-top: 5%; margin-bottom: 10%;} 
</style>
<div class="main">
		<?= form_open_multipart($action) ?>
			<?php foreach ($campos as $resultCampos): ?> 
				<?php echo form_error($resultCampos->name); ?>
				<div class="form-group">
				<?php if (
					$resultCampos->type == "varchar" && 
					$resultCampos->default != 'FILE' &&
					$resultCampos->default != 'SENHA'&&
					$resultCampos->default != 'CHECK'
					): ?>
				<?= form_label(_string($resultCampos->name));  ?>
				<?= form_input(array('name'=> $resultCampos->name , 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->primary_key == 1): ?>
				<?php elseif($resultCampos->type == "int" && $resultCampos->default != 1 ): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_input(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->type == "float" && $resultCampos->default != 1 ): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_input(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->type == "decimal" && $resultCampos->default != 1): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_input(array('name'=> $resultCampos->name, 'class' => 'form-control' ));  ?>
				<?php elseif($resultCampos->type == "longtext"): ?>	
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_textarea(array('id'=>'text' ,'name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->default == 1 && $resultCampos->name != "timestamp"): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?php $campoDrop = strval($resultCampos->name); ?>
					<?= form_dropdown(array('name'=> $resultCampos->name, 'class' => 'form-control') , $$campoDrop);  ?>
				<?php elseif($resultCampos->default == 'SENHA' && $resultCampos->name != "timestamp" && $resultCampos->type == "varchar" ): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_password(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->default == 'RADIO'): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_radio(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->default == 'CHECK' && $resultCampos->name != "timestamp" && $resultCampos->type == "varchar" ): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_checkbox(array('name'=> $resultCampos->name, 'class' => 'form-control'  , 'value' => true));  ?>
				<?php elseif($resultCampos->default == 'FILE' && $resultCampos->name != "timestamp" && $resultCampos->type == "varchar"): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_upload(array('name'=> $resultCampos->name, 'class' => 'form-control'));  ?>
				<?php elseif($resultCampos->type == "timestamp"): ?>
					<?= form_label(_string($resultCampos->name));  ?>
					<?= form_input(array('name'=> $resultCampos->name,'value'=>date("Y-m-d H:i:s") ,'class' => 'form-control'));  ?>
				<?php endif ?>
				</div>
			<?php endforeach ?>
		<?= form_submit(array('value' => 'Finalizar' , 'class' => 'btn btn-primary pull-right')) ?>
		<?= form_close() ?>
</div>