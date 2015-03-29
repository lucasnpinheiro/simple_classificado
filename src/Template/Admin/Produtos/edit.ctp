<h2><?= __('Edit') ?></h2>
<?= $this->Form->create($produto, ['type' => 'file']); ?>
<?php
echo $this->Form->input('id');
echo $this->Form->input('nome');
echo $this->Form->input('descricao');
echo $this->Form->input('valor');
echo $this->Form->input('categoria_id', ['options' => $categorias]);
echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
if ($produto->foto) {
    echo $this->Html->image('/files/' . $produto->foto, ['alt' => $produto->nome, 'style' => 'max-width: 250px;']) . '<br />';
}
echo $this->Form->label('foto');
echo $this->Form->file('foto', ['type' => 'file']);
?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
