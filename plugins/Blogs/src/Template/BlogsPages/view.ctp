<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Blogs Page'), ['action' => 'edit', $blogsPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blogs Page'), ['action' => 'delete', $blogsPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blogs Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blogs Page'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="blogsPages view large-10 medium-9 columns">
    <h2><?= h($blogsPage->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($blogsPage->nome) ?></p>
            <h6 class="subheader"><?= __('Apelido') ?></h6>
            <p><?= h($blogsPage->apelido) ?></p>
            <h6 class="subheader"><?= __('Template') ?></h6>
            <p><?= h($blogsPage->template) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($blogsPage->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($blogsPage->status) ?></p>
            <h6 class="subheader"><?= __('Incial') ?></h6>
            <p><?= $this->Number->format($blogsPage->incial) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($blogsPage->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($blogsPage->modified) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($blogsPage->updated) ?></p>
        </div>
    </div>
</div>
