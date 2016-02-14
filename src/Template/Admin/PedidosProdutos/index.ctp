<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Pedidos Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pedidosProdutos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('produto_id') ?></th>
            <th><?= $this->Paginator->sort('pedido_id') ?></th>
            <th><?= $this->Paginator->sort('quantidade') ?></th>
            <th><?= $this->Paginator->sort('valor') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pedidosProdutos as $pedidosProduto): ?>
        <tr>
            <td><?= $this->Number->format($pedidosProduto->id) ?></td>
            <td>
                <?= $pedidosProduto->has('produto') ? $this->Html->link($pedidosProduto->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $pedidosProduto->produto->id]) : '' ?>
            </td>
            <td>
                <?= $pedidosProduto->has('pedido') ? $this->Html->link($pedidosProduto->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosProduto->pedido->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($pedidosProduto->quantidade) ?></td>
            <td><?= $this->Number->format($pedidosProduto->valor) ?></td>
            <td><?= $this->Number->format($pedidosProduto->status) ?></td>
            <td><?= h($pedidosProduto->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $pedidosProduto->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedidosProduto->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidosProduto->id], ['confirm' => __('Tem certeza de que deseja excluir este registro?', $pedidosProduto->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
