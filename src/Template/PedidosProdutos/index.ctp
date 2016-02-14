<div class="panel panel-default">
    <div class="panel-heading">Carrinho</div>
    <div class="panel-body">
        <div class="col-xs-12">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr class="text-center">
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
                            <td class="text-center"><img style="max-width: 75px;" class="img-responsive" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($pedidosProduto->produto->foto), true) ?>" alt="<?= h($pedidosProduto->produto->nome); ?>"></td>
                            <td class="text-left">
                                <?= $pedidosProduto->has('produto') ? $this->Html->link($pedidosProduto->produto->nome, ['controller' => 'Produtos', 'action' => 'view', $pedidosProduto->produto->id]) : '' ?>
                            </td>
                            <td class="text-right"><?= $this->Number->format($pedidosProduto->quantidade) ?></td>
                            <td class="text-right"><?= $this->Pinheiro->moeda($pedidosProduto->valor) ?></td>
                            <td class="text-right"><?= $this->Pinheiro->moeda($pedidosProduto->quantidade * $pedidosProduto->valor) ?></td>
                            <td class="actions text-center">
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidosProduto->id], ['confirm' => __('Tem certeza de que deseja excluir este registro?', $pedidosProduto->id), 'class' => 'btn btn-danger']) ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 text-right">
            <?php
            if ($this->request->session()->read('Cliente.id') AND $this->request->session()->read('Cart.id')) {
                echo $this->Html->link('Finalizar pedido', ['controller' => 'Pedidos', 'action' => 'pageguro', $this->request->session()->read('Cart.id'), $this->request->session()->read('Cliente.id')], ['class' => 'btn btn-success']);
            } else {
                echo $this->Html->link('Autenticar para finalizar pedido', ['controller' => 'Clientes', 'action' => 'index'], ['class' => 'btn btn-success']);
            }
            ?>
        </div>

    </div>
</div>

