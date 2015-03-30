<h2><?= __('Edit') ?></h2>
<?= $this->Form->create($banner, ['type' => 'file']); ?>
<?php
if ($produto->foto) {
    echo $this->Html->image('/files/' . $produto->foto, ['alt' => $produto->nome, 'style' => 'max-width: 250px;']) . '<br />';
}
echo $this->Form->label('foto');
echo $this->Form->file('foto', ['type' => 'file']);
echo $this->Form->input('url');
echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
echo $this->Form->input('posicao', ['options' => ['1' => 'Topo', '2' => 'Rodape', '3' => 'Lateral Esquerda']]);
?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>