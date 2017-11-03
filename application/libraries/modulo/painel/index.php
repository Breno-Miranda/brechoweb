
<?php if (isset($pagination)): ?>
	<?php echo $pagination; ?>
<?php endif ?>


<table class="table-striped">
<thead>
<tr>
<?php  foreach ($campos as $resultCamposTable): ?>
<?php if ($resultCamposTable->type == "longtext" &&
		  $resultCamposTable->name === "texto" || 
		  $resultCamposTable->name === "descricao" ): ?>
<?php else: ?>
	<td><?= _string($resultCamposTable->name); ?></td>
<?php endif ?>
<?php endforeach;   ?>
<td>Ações</td>
</tr>
</thead>
<tbody>
<?php foreach ($dados_view_padrao as $resultData): //CONTEUDO DO BANCO ?>
<tr>
<?php foreach ($campos as $resultCampos): // CAMPOS DA TABELA DESEJADA  ?>
<?php  $_dados = strval($resultCampos->name); //CONVERTENDO ARRAY PRA STRING ?> 
<?php if ($resultCampos->type == "longtext" &&
          $resultCampos->name === "texto" || 
		  $resultCampos->name === "descricao" ): ?>
<?php elseif($resultCampos->default === "FILE"): ?>
	<td align="center"> <a target="blank_" href="<?= $resultData->$_dados; ?>"><i class="fa fa-picture-o fa-2x"></i></a></td>
<?php else: ?>
	<td><?= $resultData->$_dados; ?></td>
<?php endif ?>
<?php endforeach ?>
	<td>
		<a href="<?= BaseController($c_class , 'editar' , $resultData->id , 'painel') ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden=""></i></a>
		<a href="<?= BaseController($c_class , 'deletar' , $resultData->id , 'painel') ?>"><i class="fa fa-times fa-2x" aria-hidden=""></i></a>
	</td>
</tr>
</tbody>
<?php endforeach ?>
</table>
