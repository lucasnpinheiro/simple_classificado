<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Blogs Page'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="blogsPages index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
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
                <?= $this->Html->link(__('View'), ['action' => 'view', $blogsPage->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogsPage->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogsPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPage->id)]) ?>
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
