<div class="row">
    <div class="col-md-12 col-lg-12" style="margin-top:5%;">
        <h1 class="intro text-center"><span>Olá</span> <span>My Loja</span> Risol Baby <span>, </span></h1>
    </div>
</div>

<div class="row">
        <?php foreach($produtos_limits as $result):?>
        <?php if($result->imagem !== "FILE"): ?>
        <img src="<?= $result->imagem?>"  style=" max-width: 600px; max-height: 300px">
        <?php endif; ?> 
        <?php endforeach; ?>
</div>