<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="btn-group btn-group-sm pull-right">
            <?php
            echo $this->Html->link(__('List'), ['controller' => $this->request->params['controller'], 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
            echo $this->Html->link(__('Add'), ['controller' => $this->request->params['controller'], 'action' => 'add'], ['class' => 'btn btn-success btn-sm']);
            ?>
        </div>
        <h4><?php echo $this->request->params['controller']; ?> <?= __('List') ?></h4>
    </div>
    <div class="panel-body">

        <div class="panel panel-info">
            <div class="panel-body">

                <?= $this->Form->create(null, ['type' => 'file', 'class' => 'form-inline busca']); ?>
                <?php
                echo $this->Form->input('nome', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-8'], 'placeholder' => 'Posição', 'required' => false, 'label' => false, 'empty' => 'Posição', 'options' => ['1' => 'Topo', '2' => 'Rodape', '3' => 'Lateral Esquerda']]);
                echo $this->Form->input('status', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-4'], 'placeholder' => 'Situação', 'required' => false, 'label' => false, 'empty' => 'Situação', 'options' => ['0' => 'Inativo', '1' => 'Ativo']]);
                ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('altura') ?></th>
                    <th><?= $this->Paginator->sort('largura') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bannersTipos as $bannersTipo): ?>
                    <tr>
                        <td><?= $this->Number->format($bannersTipo->id) ?></td>
                        <td><?= h($bannersTipo->nome) ?></td>
                        <td><?= $this->Number->format($bannersTipo->altura) ?></td>
                        <td><?= $this->Number->format($bannersTipo->largura) ?></td>
                        <td><?= $this->Pinheiro->status($bannersTipo->status) ?></td>
                        <td><?= h($bannersTipo->created) ?></td>
                        <td><?= h($bannersTipo->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bannersTipo->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bannersTipo->id], ['confirm' => __('Tem certeza de que deseja excluir este registro?', $bannersTipo->id)]) ?>
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