<div class="panel panel-default">
    <div class="panel-heading"><?php echo $produtos_titulo; ?></div>
    <div class="panel-body">

        <?php
        if (count($produtos) > 0) {
            foreach ($produtos as $produto):
                ?>

                <div class="col-xs-12 col-md-6">
                    <div class="thumbnail" style="height: 210px; margin: 5px; border: 1px solid #dfdfdf;">

                        <div class="col-xs-12 col-md-4 thumbnail" style="position: relative; height: 120px;">
                            <img style="position: absolute; max-height: 120px; vertical-align: middle;" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= ($produto->nome); ?>">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <h3><?= h($produto->nome); ?></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-12"><?= $this->Text->truncate($produto->descricao, 50, [ 'ellipsis' => '...', 'exact' => true]); ?></div>
                                <div class="col-xs-12 text-right"><?= $this->Pinheiro->moeda($produto->valor) ?></div>
                                <div class="row text-right"><a class="btn btn-info" href="<?= $this->Url->build(['action' => 'view', $produto->id], true) ?>">+ Detalhes</a></div>
                            </div>
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