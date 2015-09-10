<div class="panel panel-default">
    <div class="panel-heading">Novo Cliente</div>
    <div class="panel-body">

        <?= $this->Form->create($cliente); ?>
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('email', ['type' => 'email']);
        echo $this->Form->input('documento', ['type' => 'numero']);
        echo $this->Form->input('cep', ['type' => 'numero','onChange'=>'util.getCep(this.value);']);
        echo $this->Form->input('logradouro');
        echo $this->Form->input('numero', ['type' => 'numero']);
        echo $this->Form->input('complemento');
        echo $this->Form->input('bairro');
        echo $this->Form->input('cidade');
        echo $this->Form->input('estado');
        echo $this->Form->input('status', ['type' => 'hidden', 'value' => 1]);
        ?>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>

    </div>
</div>
