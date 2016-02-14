<div class="panel panel-default">
    <div class="panel-heading">Novo Cliente</div>
    <div class="panel-body">

        <?= $this->Form->create($cliente); ?>
        <?php
        echo $this->Form->input('nome', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('email', ['type' => 'email', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('documento', ['label' => 'CPF/CNPJ', 'type' => 'text', 'class' => 'cpfcnpj', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo '<div class="clearfix"></div>';
        echo $this->Form->input('cep', ['type' => 'text', 'class' => 'cep', 'onChange' => 'util.getCep(this.value);', 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->input('logradouro', ['div' => ['class' => 'col-xs-12 col-md-7']]);
        echo $this->Form->input('numero', ['class' => 'numero', 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-2']]);
        echo '<div class="clearfix"></div>';
        echo $this->Form->input('complemento', ['div' => ['class' => 'col-xs-12 col-md-2']]);
        echo $this->Form->input('bairro', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('cidade', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('estado', ['div' => ['class' => 'col-xs-12 col-md-2']]);
        echo '<div class="clearfix"></div>';
        echo $this->Form->input('senha', ['type' => 'password', 'div' => ['class' => 'col-xs-12 col-md-12']]);
        echo $this->Form->input('status', ['type' => 'hidden', 'value' => 1]);
        ?>
        <div class="clearfix"></div>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>

    </div>
</div>
