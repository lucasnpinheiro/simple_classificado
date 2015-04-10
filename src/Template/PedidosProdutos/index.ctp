<div class="panel panel-default">
    <div class="panel-heading">Carrinho</div>
    <div class="panel-body">
        <div class="col-xs-12">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th><?= $this->Paginator->sort('produto_id') ?></th>
                        <th><?= $this->Paginator->sort('quantidade') ?></th>
                        <th><?= $this->Paginator->sort('valor') ?></th>
                        <th>Total</th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidosProdutos as $pedidosProduto): ?>
                        <tr>
                            <td><img style="max-width: 75px;" class="img-responsive" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($pedidosProduto->produto->foto), true) ?>" alt="<?= h($pedidosProduto->produto->nome); ?>"></td>
                            <td>
                                <?= $pedidosProduto->has('produto') ? $this->Html->link($pedidosProduto->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $pedidosProduto->produto->id]) : '' ?>
                            </td>
                            <td><?= $this->Number->format($pedidosProduto->quantidade) ?></td>
                            <td><?= $this->Pinheiro->moeda($pedidosProduto->valor) ?></td>
                            <td><?= $this->Pinheiro->moeda($pedidosProduto->quantidade * $pedidosProduto->valor) ?></td>
                            <td class="actions">
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidosProduto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosProduto->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 text-right">
            <?php
            if ($this->Session->read('Cliente.id') AND $this->Session->read('Cart.id')) {
                echo $this->Html->link('Finalizar pedido', ['controller' => 'Pedidos', 'action' => 'index', $this->Session->read('Cart.id'), $this->Session->read('Cliente.id')], ['class' => 'btn btn-success']);
            } else {
                echo $this->Html->link('Autenticar para finalizar pedido', ['controller' => 'Clientes', 'action' => 'index'], ['class' => 'btn btn-success']);
            }
            ?>
        </div>

    </div>
</div>

