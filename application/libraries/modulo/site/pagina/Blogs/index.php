
<div class="row"  style="margin-bottom:  10%; margin-top: 5%;">
 <?php foreach($Blogs as $result_blogs): ?>
  <a href="<?= BaseController('blogs' , $result_blogs->id ,'', 'site'); ?>">
    <div class="col-md-4">
     <div class="card">
      <img src="<?= $result_blogs->imagem ?>" style="width: 100%; height: 180px;">
      </div>
      <div class="card-section">
        <p><?= strtolower ($result_blogs->slug) ?></p>
      </div>
  </div> 
  </a>
<?php endforeach; ?>

</div>
<div class="row">
<?php if (isset($pagination_blogs)): ?>
      <?php echo $pagination_blogs; ?>
<?php endif ?>
</div>