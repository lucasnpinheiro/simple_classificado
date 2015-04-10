<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Blogs Posts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blogs Pages Posts'), ['controller' => 'BlogsPagesPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blogs Pages Post'), ['controller' => 'BlogsPagesPosts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="blogsPosts form large-10 medium-9 columns">
    <?= $this->Form->create($blogsPost); ?>
    <fieldset>
        <legend><?= __('Add Blogs Post') ?></legend>
        <?php
            echo $this->Form->input('titulo');
            echo $this->Form->input('conteudo');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
