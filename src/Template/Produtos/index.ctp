<div class="panel panel-default">
    <div class="panel-heading"><?php echo $produtos_titulo; ?></div>
    <div class="panel-body">


        <?php
        if (count($produtos) > 0) {
            foreach ($produtos as $produto):
                ?>


                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="item" style="min-height: 200px;">
                        <!-- Item image -->
                        <div class="item-image">
                            <a href="<?= $this->Url->build(['controller' => 'produtos', 'action' => 'categoria', 'categoria' => $produto->categoria_id], true) ?>">
                                <img class="img-responsive" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->categoria->foto), true) ?>" alt="<?= ($produto->categoria->nome); ?>">
                            </a>
                        </div>
                        <!-- Item details -->
                        <div class="item-details">
                            <!-- Name -->
                            <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
                            <h5><?= h($produto->categoria->nome); ?></h5>
                            <div class="clearfix"></div>
                            <!-- Para. Note more than 2 lines. -->
                            <hr />
                            <!-- Add to cart -->
                            <div class="button pull-right"><a class="btn btn-info" href="<?= $this->Url->build(['controller' => 'produtos', 'action' => 'categoria', 'categoria' => $produto->categoria_id], true) ?>">+ Produtos</a></div>
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
</div>