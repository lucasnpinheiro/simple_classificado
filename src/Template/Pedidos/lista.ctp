<div class="panel panel-default">
    <div class="panel-heading"><?php echo $pedidos_titulo; ?></div>
    <div class="panel-body">


        <?php
        if (count($pedidos) > 0) {
            foreach ($pedidos as $pedido):
                ?>
                <h2>Pedido: <?php echo $pedido->id; ?></h2>
                <h3>
                    <div class="col-xs-12 col-md-6">Situação: <?php echo $this->Pinheiro->status($pedido->status); ?></div>
                    <div class="col-xs-12 col-md-6 text-right">Data do pedido: <?php echo $pedido->created->format('d/m/Y H:i:s'); ?></div>
                </h3>
                <div>
                    <table class="table table-bordered table-condensed table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Valor Unitatio</th>
                                <th>Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedido->produtos as $k => $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->nome; ?></td>
                                    <td class="text-right"><?php echo $v->_joinData->quantidade; ?></td>
                                    <td class="text-right"><?php echo $this->Pinheiro->moeda($v->_joinData->valor); ?></td>
                                    <td class="text-right"><?php echo $this->Pinheiro->moeda(((float) $v->_joinData->quantidade) * ((float) $v->_joinData->valor)); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <?php
            endforeach;
        } else {
            echo $this->Html->alert('Nenhum registro localizado.');
        }
        ?>

    </div>
</div>