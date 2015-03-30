<div class="panel panel-primary">
    <div class="panel-heading"><?= __('Edit') ?></div>
    <?= $this->Form->create($categoria); ?>
    <div class="panel-body">
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
        ?>
    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'),['icon'=>'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>