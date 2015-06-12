<div class="panel panel-default">
    <div class="panel-heading"><?php echo $produtos_titulo; ?></div>
    <div class="panel-body">
        <?php
        if (count($produtos) > 0) {
            foreach ($produtos as $produto):
                ?>


                <div class="col-md-3 col-sm-4">
                    <div class="item">
                        <!-- Item image -->
                        <div class="item-image">
                            <a href="">
                                <img style="max-width: 100%; max-height: 100%;" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= ($produto->nome); ?>">
                            </a>
                        </div>
                        <!-- Item details -->
                        <div class="item-details">
                            <!-- Name -->
                            <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
                            <h5><?= h($produto->nome); ?></h5>
                            <div class="clearfix"></div>
                            <!-- Para. Note more than 2 lines. -->
                            <hr />

                            <div class="item-price pull-left"><?= $this->Pinheiro->moeda($produto->valor) ?></div>
                            <!-- Add to cart -->
                            <div class="button pull-right"><a class="btn btn-info" href="<?= $this->Url->build(['action' => 'view', $produto->id], true) ?>">+ Detalhes</a></div>
                            <div class="clearfix"></div>
                        </div>
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
            <?= $this->Paginator->numbers(['prev' => '< ' . __('previous'), 'next' => __('next') . ' >']) ?>
        </div>
    </div>
</div>