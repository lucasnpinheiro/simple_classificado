<div class="panel panel-default">
    <div class="panel-heading"><?php echo $produtos_titulo; ?></div>
    <div class="panel-body">
        <?php
        if (count($produtos) > 0) {
            foreach ($produtos as $produto):
                ?>

                <div class="col-xs-12 col-md-4">
                    <div class="thumbnail" style="height: 150px; margin: 2px; border: 1px solid #dfdfdf;">

                        <div class="col-xs-12 col-md-4 thumbnail" style="position: relative; height: 120px;">
                            <img style="position: absolute; max-height: 120px; vertical-align: middle;" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->categoria->foto), true) ?>" alt="<?= ($produto->categoria->nome); ?>">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <h3><?= h($produto->categoria->nome); ?></h3>
                            <div class="row text-right"><a style="margin-top: 53px; margin-right: 5px;" class="btn btn-info" href="<?= $this->Url->build(['controller' => 'produtos', 'action' => 'categoria', 'categoria' => $produto->categoria_id], true) ?>">+ Produtos</a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php
            endforeach;
        } else {
            echo $this->Html->alert('Nenhum registro localizado.');
        }
        ?>

    </div>
    <div class="panel-footer">
        <div class="paginator text-center">
            <ul class="pagination">
                <?= $this->Paginator->numbers(['prev' => '< ' . __('previous'), 'next' => __('next') . ' >']) ?>
            </ul>
        </div>
    </div>
</div>