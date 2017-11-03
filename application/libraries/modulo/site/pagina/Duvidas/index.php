<div class="container-fluid main">
    <div class="container">
        <div class="col-md-12">
        <?php foreach ($layout as $lay): ?>
                <?php $dados = strval($lay->tabelas); ?>
                <?php if ($lay->tb_Posicao == "main-duvidas"): ?>
                    <h2 class="text-center"><?= $lay->titulo ?></h2>
                    <p class="text-center"><?= $lay->texto ?></p>
                <?php endif ?>
            <?php endforeach ?>
            <div class="list-group">

                <?php foreach ($layout as $lay): ?>
                    <?php $dados = strval($lay->tabelas); ?>
                    <?php if ($lay->tb_Posicao == "main-duvidas"): ?>

                        <?php foreach ($data[$dados] as $result):?>
                            <a  class="list-group-item" data-toggle="modal" data-target="#<?= $result->id ?>">
                                <?= $result->titulo ?>
                            </a>
                            <div class="modal fade" id="<?= $result->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"> <?= $result->titulo ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?= $result->texto ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
       
    </div>
</div>
