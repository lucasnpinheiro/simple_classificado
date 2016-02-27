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
                echo $this->Form->input('nome', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-8'], 'placeholder' => 'Nome', 'required' => false, 'label' => false, 'empty' => 'Nome']);
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
                    <th><?= $this->Paginator->sort('apelido') ?></th>
                    <th><?= $this->Paginator->sort('template') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('incial') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogsPages as $blogsPage): ?>
                    <tr>
                        <td><?= $this->Number->format($blogsPage->id) ?></td>
                        <td><?= h($blogsPage->nome) ?></td>
                        <td><?= h($blogsPage->apelido) ?></td>
                        <td><?= h($blogsPage->template) ?></td>
                        <td><?= $this->Number->format($blogsPage->status) ?></td>
                        <td><?= $this->Number->format($blogsPage->incial) ?></td>
                        <td><?= h($blogsPage->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogsPage->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogsPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPage->id)]) ?>
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