<div class="panel panel-default">
    <div class="panel-heading"><?= h($produto->nome) ?></div>
    <div class="panel-body">

        <div class="col-md-4">
            <img class="img-responsive" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= h($produto->nome); ?>">
        </div>

        <div class="col-md-8">
            <h3><?= h($produto->nome) ?></h3>
            <p>Valor: <?= $this->Pinheiro->moeda($produto->valor) ?></p>
            <p>Categoria: <?= $produto->categoria->nome; ?></p>
            <p>Descrição: <?= $this->Text->autoParagraph(h($produto->descricao)); ?></p>
            <p>
                <?= $this->Form->create($pedidosProduto, ['url' => array('controller' => 'PedidosProdutos', 'action' => 'add')]); ?>
                <?php
                echo $this->Form->input('produto_id', ['value' => $produto->id, 'type' => 'hidden']);
                echo $this->Form->input('valor', ['value' => $produto->valor, 'type' => 'hidden']);
                echo $this->Form->input('status', ['value' => 1, 'type' => 'hidden']);
                echo $this->Form->input('quantidade');
                ?>
                <?= $this->Form->button(__('Adicionar ao carrinho')) ?>
                <?= $this->Form->end() ?>

            </p>
        </div>
    </div>
</div>