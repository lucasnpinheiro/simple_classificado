<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="btn-group btn-group-sm pull-right">
            <?php
            echo $this->Html->link(__('List'), ['controller' => $this->request->params['controller'], 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
            ?>
        </div>
        <h4><?php echo $this->request->params['controller']; ?> <?= __('Edit') ?></h4>
    </div>
    <?= $this->Form->create($pedido); ?>
    <div class="panel-body">

        <?php
        echo $this->Form->input('cliente_id', ['type' => 'hidden']);
        echo $this->Form->input('status', ['label'=>'Situação do Pedido','options' => ['0' => 'Inativo', '1' => 'Ativo', '2' => 'Entregue']]);
        ?>
        <div class="col-xs-12 col-md-6"><strong>Nome:</strong> <?php echo h($pedido->cliente->nome) . ' ' . $this->Pinheiro->status($pedido->cliente->status); ?></div>
        <div class="col-xs-12 col-md-6"><strong>E-mail:</strong> <?php echo h($pedido->cliente->email); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Documento:</strong> <?php echo h($pedido->cliente->documento); ?></div>
        <div class="col-xs-12 col-md-6"><strong>CEP:</strong> <?php echo h($pedido->cliente->cep); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Logradouro:</strong> <?php echo h($pedido->cliente->logradouro); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Número:</strong> <?php echo h($pedido->cliente->numero); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Complemento:</strong> <?php echo h($pedido->cliente->complemento); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Bairro:</strong> <?php echo h($pedido->cliente->bairro); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Cidade:</strong> <?php echo h($pedido->cliente->cidade); ?></div>
        <div class="col-xs-12 col-md-6"><strong>Estado:</strong> <?php echo h($pedido->cliente->estado); ?></div>

        <div class="clearfix"></div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Produtos</h4>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Situação</th>
                            <th>Valor</th>
                            <th>Quantidade</th>
                            <th>Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produtos->toArray() as $produto):
                            ?>
                            <tr>
                                <td><?= h($produto['produto']['nome']) ?></td>
                                <td><?= $this->Pinheiro->status($produto['status']) ?></td>
                                <td><?= $this->Pinheiro->moeda($produto['valor']) ?></td>
                                <td><?= h($produto['quantidade']) ?></td>
                                <td><?= $this->Pinheiro->moeda($produto['quantidade'] * $produto['valor']) ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'), ['icon' => 'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>
</div>