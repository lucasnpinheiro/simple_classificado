<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="btn-group btn-group-sm pull-right">
            <?php
            echo $this->Html->link(__('List'), ['plugin' => $this->request->params['plugin'], 'controller' => $this->request->params['controller'], 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
            echo $this->Html->link(__('Add'), ['plugin' => $this->request->params['plugin'], 'controller' => $this->request->params['controller'], 'action' => 'add'], ['class' => 'btn btn-success btn-sm']);
            ?>
        </div>
        <h4><?php echo $this->request->params['controller']; ?> <?= __('List') ?></h4>
    </div>
    <div class="panel-body">

        <div class="panel panel-info">
            <div class="panel-body">

                <?= $this->Form->create($blogsPost, ['type' => 'file', 'class' => 'form-inline busca']); ?>
                <?php
                echo $this->Form->input('BlogsPost.titulo', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-8'], 'placeholder' => 'Titulo', 'required' => false, 'label' => false, 'empty' => 'Titulo']);
                echo $this->Form->input('BlogsPost.status', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-4'], 'placeholder' => 'Situação', 'required' => false, 'label' => false, 'empty' => 'Situação', 'options' => ['0' => 'Inativo', '1' => 'Ativo']]);
                ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogsPosts as $blogsPost): ?>
                    <tr>
                        <td><?= $this->Number->format($blogsPost->id) ?></td>
                        <td><?= h($blogsPost->titulo) ?></td>
                        <td><?= $this->Pinheiro->status($blogsPost->status) ?></td>
                        <td><?= h($blogsPost->created) ?></td>
                        <td><?= h($blogsPost->modified) ?></td>
                        <td><?= h($blogsPost->updated) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['plugin' => $this->request->params['plugin'], 'action' => 'edit', $blogsPost->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['plugin' => $this->request->params['plugin'], 'action' => 'delete', $blogsPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPost->id)]) ?>
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
