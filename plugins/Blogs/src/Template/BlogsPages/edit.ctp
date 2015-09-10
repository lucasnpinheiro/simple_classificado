<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $blogsPage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Blogs Pages'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="blogsPages form large-10 medium-9 columns">
    <?= $this->Form->create($blogsPage); ?>
    <fieldset>
        <legend><?= __('Edit Blogs Page') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('apelido');
            echo $this->Form->input('template');
            echo $this->Form->input('status');
            echo $this->Form->input('incial');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
