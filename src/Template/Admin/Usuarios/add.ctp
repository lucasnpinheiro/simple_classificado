<div class="panel panel-primary">
    <div class="panel-heading"><?= __('Add') ?></div>
    <?= $this->Form->create($usuario); ?>
    <div class="panel-body">
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('email');
        echo $this->Form->input('senha', ['value' => '']);
        echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
        ?>
    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'),['icon'=>'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>