<div class="panel panel-primary">
    <div class="panel-heading"><?= __('List') ?></div>
    <div class="panel-body">

        <div class="panel panel-info">
            <div class="panel-body">

                <?= $this->Form->create($produto, ['type' => 'file', 'class' => 'form-inline busca']); ?>
                <?php
                echo $this->Form->input('Produtos.nome', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-3'], 'placeholder' => 'Nome', 'required' => false, 'label' => false]);
                echo $this->Form->input('Produtos.valor', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-3'], 'placeholder' => 'Valor', 'required' => false, 'label' => false]);
                echo $this->Form->input('Produtos.categoria_id', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-3'], 'placeholder' => 'Categorias', 'required' => false, 'label' => false, 'empty' => 'Categoria', 'options' => $categorias]);
                echo $this->Form->input('Produtos.status', ['class' => 'col-xs-12', 'div' => ['class' => 'col-xs-12 col-md-3'], 'placeholder' => 'Situação', 'required' => false, 'label' => false, 'empty' => 'Situação', 'options' => ['0' => 'Inativo', '1' => 'Ativo']]);
                ?>
                <?= $this->Form->end() ?>
            </div>
        </div>


        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('foto') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>

                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><img style="max-width: 50px;" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= ($produto->nome); ?>"></td>
                        <td><?= h($produto->nome) ?></td>
                        <td><?= $this->Pinheiro->moeda($produto->valor) ?></td>

                        <td>
                            <?= $produto->has('categoria') ? $this->Html->link($produto->categoria->nome, ['controller' => 'Categorias', 'action' => 'index', $produto->categoria->id]) : '' ?>
                        </td>
                        <td><?= $this->Pinheiro->status($produto->status) ?></td>
                        <td><?= h($produto->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div class="panel-footer text-center">
        <?= $this->Paginator->numbers(['prev' => '< ' . __('previous'), 'next' => __('next') . ' >']) ?>&nbsp;
    </div>
</div>
