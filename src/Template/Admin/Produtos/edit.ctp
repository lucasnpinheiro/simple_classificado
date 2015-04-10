<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="btn-group btn-group-sm pull-right">
            <?php
            echo $this->Html->link(__('List'), ['controller' => $this->request->params['controller'], 'action' => 'index'], ['class' => 'btn btn-info btn-sm']);
            echo $this->Html->link(__('Add'), ['controller' => $this->request->params['controller'], 'action' => 'add'], ['class' => 'btn btn-success btn-sm']);
            ?>
        </div>
        <h4><?php echo $this->request->params['controller']; ?> <?= __('Edit') ?></h4>
    </div>
    <?= $this->Form->create($produto, ['type' => 'file']); ?>
    <div class="panel-body">
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->editor('descricao');
        echo $this->Form->input('valor', ['type' => 'text', 'class' => 'moeda']);
        echo $this->Form->input('categoria_id', ['options' => $categorias]);
        echo $this->Form->input('status', ['options' => ['0' => 'Inativo', '1' => 'Ativo']]);
        if ($produto->foto) {
            echo $this->Html->image('/files/' . $produto->foto, ['alt' => $produto->nome, 'style' => 'max-width: 250px;']) . '<br />';
        }
        echo $this->Form->label('foto');
        echo $this->Form->file('foto', ['type' => 'file']);
        ?>
    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'), ['icon' => 'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>
