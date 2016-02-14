<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="btn-group btn-group-sm pull-right">
            <?php
            echo $this->Html->link(__('List'), ['controller' => $this->request->params['controller'], 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
            ?>
        </div>
        <h4><?php echo $this->request->params['controller']; ?> <?= __('List') ?></h4>
    </div>
    <div class="panel-body">

        
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?= $this->Number->format($pedido->id) ?></td>
                        <td>
                            <?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->id, ['controller' => 'Clientes', 'action' => 'edit', $pedido->cliente->id]) : '' ?>
                        </td>
                        <td><?= $this->Pinheiro->statusPagSeguro($pedido->status) ?></td>
                        <td><?= h($pedido->created) ?></td>
                        <td><?= h($pedido->modified) ?></td>
                        <td><?= h($pedido->updated) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Tem certeza de que deseja excluir este registro?', $pedido->id)]) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div class="panel-footer text-center">
        <?= $this->Paginator->numbers(['prev' => '< ' . __('previous'), 'next' => __('next') . ' >']) ?>&nbsp;
    </div>
</div>