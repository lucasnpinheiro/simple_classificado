<div class="panel panel-primary">
    <div class="panel-heading"><?= __('List') ?></div>
    <div class="panel-body">

        <div class="panel panel-info">
            <div class="panel-body">

                <?= $this->Form->create($usuario, ['type' => 'file', 'class' => 'form-inline busca']); ?>
                <?php
                echo $this->Form->input('Usuarios.nome', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-4'], 'placeholder' => 'Nome', 'required' => false, 'label' => false]);
                echo $this->Form->input('Usuarios.email', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-4'], 'placeholder' => 'Valor', 'required' => false, 'label' => false]);
                echo $this->Form->input('Usuarios.status', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-4'], 'placeholder' => 'Situação', 'required' => false, 'label' => false, 'empty' => 'Situação', 'options' => ['0' => 'Inativo', '1' => 'Ativo']]);
                ?>
                <?= $this->Form->end() ?>
            </div>
        </div>


        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $this->Number->format($usuario->id) ?></td>
                        <td><?= h($usuario->nome) ?></td>
                        <td><?= h($usuario->email) ?></td>
                        <td><?= $this->Pinheiro->status($usuario->status) ?></td>
                        <td><?= h($usuario->created) ?></td>
                        <td><?= h($usuario->updated) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
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
