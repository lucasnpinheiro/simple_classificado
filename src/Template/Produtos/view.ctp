<div class="panel panel-default">
    <div class="panel-heading"><?= h($produto->nome) ?></div>
    <div class="panel-body">

        <div class="col-md-4">
            <img class="img-responsive" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= h($produto->nome); ?>">
        </div>

        <div class="col-md-8">
            <h1><?= h($produto->nome) ?></h1>
            <br>
            <h3 class="text-right">Valor: <?= $this->Pinheiro->moeda($produto->valor) ?></h3>
            <hr>
            <p><strong>Categoria:</strong> <?= $produto->categoria->nome; ?></p>
            <br>
            <p><strong>Descrição:</strong> <?= $this->Text->autoParagraph($produto->descricao); ?></p>
            <hr>
            <div class="text-right">
                <?= $this->Form->create($pedidosProduto, ['horizontal' => true, 'url' => array('controller' => 'PedidosProdutos', 'action' => 'add')]); ?>

                <?php
                echo $this->Form->input('quantidade', [
                    'value' => '1',
                    'append' => $this->Form->button(__('Adicionar ao carrinho'))
                ]);
                echo $this->Form->input('produto_id', ['value' => $produto->id, 'type' => 'hidden']);
                echo $this->Form->input('valor', ['value' => $produto->valor, 'type' => 'hidden']);
                echo $this->Form->input('status', ['value' => 1, 'type' => 'hidden']);
                ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>