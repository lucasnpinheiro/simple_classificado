<?php foreach ($produtos as $produto): ?>

    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= ($produto->nome); ?>">
            <div class="caption">
                <h4><a href="<?= $this->Url->build(['action' => 'view', $produto->id], true) ?>"><?= h($produto->nome); ?></a></h4>
                <h4 class="text-right"><?= $this->Pinheiro->moeda($produto->valor) ?></h4>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<div class="clearfix"></div>

<div class="paginator text-center">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
</div>
