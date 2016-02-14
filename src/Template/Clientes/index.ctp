<div class="panel panel-default">
    <div class="panel-heading">Autenticação</div>
    <div class="panel-body">
        <div class="col-xs-12 col-md-7">
            <div class="panel panel-info">
                <div class="panel-heading">Informe seu e-mail ou documento (CPF/CNPJ), para recuperar o seu cadastro.</div>
                <div class="panel-body">
                    <?= $this->Form->create($cliente); ?>
                    <?php
                    echo $this->Form->input('email', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                    echo $this->Form->input('documento', ['label' => 'CPF/CNPJ', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                    echo $this->Form->input('senha', ['required' => true, 'type' => 'password']);
                    ?>
                    <?= $this->Form->button(__('Logar'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-md-5">
            <div class="panel panel-warning">
                <div class="panel-heading">Caso você não tenha nenhum cadastro, registre-se.</div>
                <div class="panel-body">
                    <?php echo $this->Html->link('Cadastrar-se', ['controller' => 'Clientes', 'action' => 'add'], ['class' => 'btn btn-primary']); ?>
                </div>
            </div>


        </div>
    </div>
</div>

