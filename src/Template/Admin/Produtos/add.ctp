<div class="panel panel-primary">
    <div class="panel-heading"><?= __('Add') ?></div>
    <?= $this->Form->create($produto, ['type' => 'file']); ?>
    <div class="panel-body">
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('descricao');
        echo $this->Form->input('valor');
        echo $this->Form->input('categoria_id', ['options' => $categorias]);
        echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
        echo $this->Form->label('foto');
        echo $this->Form->file('foto', ['type' => 'file']);
        ?>
    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'),['icon'=>'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>