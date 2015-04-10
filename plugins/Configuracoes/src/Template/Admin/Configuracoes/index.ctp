<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Configurações <?= __('Edit') ?></h4>
    </div>
    <?= $this->Form->create($configuracao, ['type' => 'file']); ?>
    <div class="panel-body">

        <div role="tabpanel">

            <?php
            $grupos = [];
            foreach ($configuracoes as $key => $value):
                $ex = explode('.', $value['chave']);
                $grupos[$ex[0]][] = $value;
            endforeach;
            ?>



            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php
                $active = true;
                foreach ($grupos as $k => $v):
                    echo '<li role="presentation" class="' . ($active == true ? 'active' : '' ) . '"><a href="#' . $k . '" aria-controls="' . $k . '" role="tab" data-toggle="tab">' . $k . '</a></li>';
                    $active = false;
                endforeach;
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                $active = true;
                foreach ($grupos as $k => $v):
                    ?>
                    <div role="tabpanel" class="tab-pane <?php echo $active == true ? 'active' : '' ?>" id="<?php echo $k; ?>"><?php
                        $active = FALSE;
                        foreach ($v as $key => $value):
                            $dados = [];
                            //`id`, `nome`, `chave`, `value`, `required`, `options`, `status`, `created`, `updated`, `modified`, `after`, `before`
                            $dados = [
                                'type' => $value['tipo'],
                                'label' => $value['nome'],
                                'value' => $value['value'],
                                'required' => (bool) $value['required'],
                                'options' => ($value['options'] != '' ? json_decode($value['options'], true) : ''),
                            ];
                            if ($value['tipo'] != 'select') {
                                unset($dados['options']);
                            }
                            echo $this->Form->input($value['id'], $dados);
                        endforeach;
                        ?>
                    </div>
                    <?php
                endforeach;
                ?>

            </div>

        </div>

    </div>
    <div class="panel-footer text-right">
        <?= $this->Form->button(__('Submit'), ['icon' => 'glyphicon glyphicon-floppy-disk']) ?>&nbsp;
    </div>
    <?= $this->Form->end() ?>

</div>