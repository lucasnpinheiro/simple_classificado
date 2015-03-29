

<div class="row">

    <div class="col-xs-12 col-md-4"></div>

    <div class="col-xs-12 col-md-4">
        <h1>Contato</h1>
        <?php
        echo $this->Form->create('Usuarios.Usuario');
        ?>
        <div class="form-group">
            <label for="">E-mail</label>
            <?php echo $this->Form->input('Usuario.email', ['type' => 'mail', 'label' => false, 'placeholder' => 'E-mail', 'class' => 'form-control']); ?>
        </div>

        <div class="form-group">
            <label for="">Nome</label>
            <?php echo $this->Form->input('Usuario.nome', ['type' => 'text', 'label' => false, 'placeholder' => 'Nome', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label for="">Assunto</label>
            <?php echo $this->Form->input('Usuario.assunto', ['type' => 'textarea', 'label' => false, 'placeholder' => 'Assunto', 'class' => 'form-control']); ?>
        </div>
        <div class="text-right">
            <?php
            echo $this->Form->button(__('Enviar'), ['class' => 'btn btn-default']);
            ?>
        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>