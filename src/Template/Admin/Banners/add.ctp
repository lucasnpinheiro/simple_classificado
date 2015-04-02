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
    <?= $this->Form->create($banner, ['type' => 'file']); ?>
    <div class="panel-body">
        <?php
        echo $this->Form->label('foto');
        echo $this->Form->file('foto', ['type' => 'file']);
        echo $this->Form->input('url');
        echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
        echo $this->Form->input('posicao', ['options' => ['1' => 'Topo', '2' => 'Rodape', '3' => 'Lateral Esquerda', '4' => 'Lateral Direita']]);
        ?>
    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'),['icon'=>'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>