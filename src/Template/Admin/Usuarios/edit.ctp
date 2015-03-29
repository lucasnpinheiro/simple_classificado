<h2><?= __('Edit') ?></h2>
<?= $this->Form->create($usuario); ?>

<?php
echo $this->Form->input('id');
echo $this->Form->input('nome');
echo $this->Form->input('email');
echo $this->Form->input('senha', ['value' => '']);
echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>