

<div class="row"  style="margin-bottom:  10%; margin-top: 5%;">
<?php foreach($$c_class as $result): ?>
 <a href="<?= BaseController('politica' , $result->id ,'', 'site'); ?>">
   <div class="col-md-4">
    <div class="card">
     <img src="<?= $result->imagem ?>" style="width: 100%; height: 180px;">
     </div>
     <div class="card-section">
       <p><?= strtolower ($result->slug) ?></p>
     </div>
 </div> 
 </a>
<?php endforeach; ?>

</div>
<div class="row">
<?php if (isset($pagination)): ?>
     <?php echo $pagination; ?>
<?php endif ?>
</div>