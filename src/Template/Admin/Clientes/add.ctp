<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="btn-group btn-group-sm pull-right">
            <?php
            echo $this->Html->link(__('List'), ['controller' => $this->request->params['controller'], 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
            echo $this->Html->link(__('Add'), ['controller' => $this->request->params['controller'], 'action' => 'add'], ['class' => 'btn btn-success btn-sm']);
            ?>
        </div>
        <h4><?php echo $this->request->params['controller']; ?> <?= __('Add') ?></h4>
    </div>
    <?= $this->Form->create($cliente); ?>
    <div class="panel-body">
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('email');
        echo $this->Form->input('documento');
        echo $this->Form->input('cep');
        echo $this->Form->input('logradouro');
        echo $this->Form->input('numero');
        echo $this->Form->input('complemento');
        echo $this->Form->input('bairro');
        echo $this->Form->input('cidade');
        echo $this->Form->input('estado');
        echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
        echo $this->Form->input('senha', ['value' => '']);
        ?>
    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'), ['icon' => 'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>