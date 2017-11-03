
<div class="row"  style="margin-bottom:  2%">
 <?php foreach($$c_class as $result): ?>
  <a href="<?= BaseController($c_class , 'view/id/'.$result->id.'/titulo'  ,url_title( $result->slug ), 'site'); ?>">
    <div class="large-4 columns">
     <div class="card">
      <img src="<?= $result->imagem ?>" style="width: 100%; height: 180px;">
      </div>
      <div class="card-section">
        <p align="center"><?= $result->slug ?></p>
      </div>
  </div> 
  </a>
<?php endforeach; ?>
</div>
<?php if (isset($pagination_paginas)): ?>
      <?php echo $pagination_paginas; ?>
<?php endif ?>
