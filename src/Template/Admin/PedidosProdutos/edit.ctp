<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedidosProduto->id],
                ['confirm' => __('Tem certeza de que deseja excluir este registro?', $pedidosProduto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pedidosProdutos form large-10 medium-9 columns">
    <?= $this->Form->create($pedidosProduto); ?>
    <fieldset>
        <legend><?= __('Edit Pedidos Produto') ?></legend>
        <?php
            echo $this->Form->input('produto_id', ['options' => $produtos]);
            echo $this->Form->input('pedido_id', ['options' => $pedidos]);
            echo $this->Form->input('quantidade');
            echo $this->Form->input('valor');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
