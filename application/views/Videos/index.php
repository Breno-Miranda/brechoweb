<table class="table-striped">
	<thead>
		<tr>
			<?php  foreach ($campos as $resultCamposTable): ?>
			<?php //echo '<pre>'; print_r($resultCamposTable) ?>
				<?php if ($resultCamposTable->type == "longtext" &&  $resultCamposTable->name === "texto" ||   $resultCamposTable->name === "descricao" ): ?>
				<?php else: ?>	<td><?= _string($resultCamposTable->name); ?></td> <?php endif ?>
			<?php endforeach; ?>
			<td>Ações</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($dados_view_padrao as $resultData): //CONTEUDO DO BANCO ?>
		<tr>
			<?php foreach ($campos as $resultCampos):  $_dados = strval($resultCampos->name); //CONVERTENDO ARRAY PRA STRING  ?>
			<?php if ($resultCampos->type == "longtext" && $resultCampos->name === "texto" ||  $resultCampos->name === "descricao" ): ?>
			<!-- campos que nao entra -->
			<?php elseif($resultCampos->default === "FILE"): ?><td align="center"> <a target="blank_" href="<?= $resultData->$_dados; ?>">IMG</a></td>
			<?php elseif( $resultCampos->name === "view"): ?> <?php if($resultData->$_dados === '1'): ?> <td>ok</td> <?php else: ?> <td>x</td><?php endif; ?>
			<?php elseif( $resultCampos->name === "salvar"): ?> <?php if($resultData->$_dados === '1'): ?> <td>ok</td> <?php else: ?> <td>x</td><?php endif; ?>
			<?php elseif( $resultCampos->name === "editar"): ?> <?php if($resultData->$_dados === '1'): ?> <td>ok</td> <?php else: ?> <td>x</td><?php endif; ?>
			<?php elseif( $resultCampos->name === "deletar"): ?> <?php if($resultData->$_dados === '1'): ?> <td>ok</td> <?php else: ?> <td>x</td><?php endif; ?>
			<?php else: ?> 	<td><?= $resultData->$_dados; ?></td> <?php endif ?>
			<?php endforeach ?>
			<td>
				<a href="<?= BaseController($c_class , 'editar' , $resultData->id , 'painel') ?>"><i style="font-size:20px;" class="icon icon-pencil" aria-hidden=""></i></a>
				<a href="<?= BaseController($c_class , 'deletar' , $resultData->id , 'painel') ?>"><i  style="font-size: 20px;" class="icon icon-trash" aria-hidden=""></i></a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<div class="row pagination-margin">
	<?php if (isset($pagination)): ?>
		<?php echo $pagination; ?>
	<?php endif ?>
</div>
