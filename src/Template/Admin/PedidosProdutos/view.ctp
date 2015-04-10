<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Pedidos Produto'), ['action' => 'edit', $pedidosProduto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedidos Produto'), ['action' => 'delete', $pedidosProduto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosProduto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pedidosProdutos view large-10 medium-9 columns">
    <h2><?= h($pedidosProduto->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Produto') ?></h6>
            <p><?= $pedidosProduto->has('produto') ? $this->Html->link($pedidosProduto->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $pedidosProduto->produto->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Pedido') ?></h6>
            <p><?= $pedidosProduto->has('pedido') ? $this->Html->link($pedidosProduto->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosProduto->pedido->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($pedidosProduto->id) ?></p>
            <h6 class="subheader"><?= __('Quantidade') ?></h6>
            <p><?= $this->Number->format($pedidosProduto->quantidade) ?></p>
            <h6 class="subheader"><?= __('Valor') ?></h6>
            <p><?= $this->Number->format($pedidosProduto->valor) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($pedidosProduto->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($pedidosProduto->created) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($pedidosProduto->updated) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($pedidosProduto->modified) ?></p>
        </div>
    </div>
</div>
