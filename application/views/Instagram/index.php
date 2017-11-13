<style type="text/css">
	.main{ margin: auto; width: 100%; height:600px; background: #fff;  padding: 10px; margin-top: 0%; margin-bottom: 10%;} 

    .div-left{  width: 40%; height: 600px; overflow: 100px; overflow: scroll;}
    .div-top{width: 33%; height: 250px; float: left; }
    .div-top span{ font-size: 40px;  }
    .div-top p{ font-size: 20px;  }
    
</style>
<div class="main">
    <?php if(empty($conta)): ?>
        <a class="btn btn-lg btn-positive" class="login" href="<?= $link['url']?>"><?= $link['titulo']?></a>
    <?php endif; ?>
    <?php if(!empty($conta)): ?>
    <div class="div-top">
        <img  class="img-circle" src="<?= $conta->user_picture ?>" alt="">
        <h3><?= $conta->user_full_name ?></h3>
    </div>
    <div class="div-top">
      <span><?= $total_likes ?></span>
      <p>likes</p>
    </div>
    <div class="div-top">
        <span><?= $total_comments ?></span>
        <p>comments</p>
    </div>
    <div class="div-left">
    <ul class="list-group ">
        <li class="list-group-header">
            <p align="center">Ultimos POST</p>
        </li>
        <?php foreach($midia->data as $index => $result): ?>
        <?php //echo '<pre>'; print_r($result); ?>
            <li class="list-group-item">
                <img class="img-circle media-object pull-left" src="<?= $result->images->thumbnail->url ?>" width="32" height="32">
                <div class="media-body">
                <?php if(!empty($result->caption)): ?>
                <strong><?= $result->caption->text ?></strong>
                <?php else: ?>
                <strong> Sem Tititulo </strong>
                <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>
    <?php // echo '<pre>'; print_r($midia->data); ?>
    <?php endif; ?>
</div>
