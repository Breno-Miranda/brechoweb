
<style type="text/css">
  iframe{
    width: 100%;
    height: 150px;
  }
</style>
<div class="row"  style="margin-bottom:  10%; margin-top: 5%;">
<div class="row">
    <h2>Videos</h2>
    <hr>
</div>
 <ul class="clearing-thumbs small-block-grid-4" data-clearing style="padding: 2%">
  <?php foreach ($Videos as $result_videos_limit_noticias): ?>
      <li>
        <?= $result_videos_limit_noticias->iframe ?>
        <a href="<?= BaseController('videos' , 'view/id/'.$result_videos_limit_noticias->id.'/titulo'  ,url_title( $result_videos_limit_noticias->slug ), 'site'); ?>" class="button small expanded" href="#">Assistir o video</a>
      </a>
      </li>
  <?php endforeach ?>
</div>
<div class="row">
<?php if (isset($pagination_videos)): ?>
      <?php echo $pagination_videos; ?>
<?php endif ?>
</div>