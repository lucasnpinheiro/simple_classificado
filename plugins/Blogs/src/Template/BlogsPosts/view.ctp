<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Blogs Post'), ['action' => 'edit', $blogsPost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blogs Post'), ['action' => 'delete', $blogsPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPost->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blogs Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blogs Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs Pages Posts'), ['controller' => 'BlogsPagesPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blogs Pages Post'), ['controller' => 'BlogsPagesPosts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="blogsPosts view large-10 medium-9 columns">
    <h2><?= h($blogsPost->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Titulo') ?></h6>
            <p><?= h($blogsPost->titulo) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($blogsPost->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($blogsPost->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($blogsPost->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($blogsPost->modified) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($blogsPost->updated) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Conteudo') ?></h6>
            <?= $this->Text->autoParagraph(h($blogsPost->conteudo)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related BlogsPagesPosts') ?></h4>
    <?php if (!empty($blogsPost->blogs_pages_posts)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Blogs Page Id') ?></th>
            <th><?= __('Blogs Post Id') ?></th>
            <th><?= __('Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($blogsPost->blogs_pages_posts as $blogsPagesPosts): ?>
        <tr>
            <td><?= h($blogsPagesPosts->id) ?></td>
            <td><?= h($blogsPagesPosts->blogs_page_id) ?></td>
            <td><?= h($blogsPagesPosts->blogs_post_id) ?></td>
            <td><?= h($blogsPagesPosts->created) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'BlogsPagesPosts', 'action' => 'view', $blogsPagesPosts->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'BlogsPagesPosts', 'action' => 'edit', $blogsPagesPosts->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BlogsPagesPosts', 'action' => 'delete', $blogsPagesPosts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsPagesPosts->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
