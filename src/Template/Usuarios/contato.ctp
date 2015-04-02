<div class="panel panel-default">
    <div class="panel-heading">Contato</div>
    <div class="panel-body">
        <?php echo $this->Form->create('Usuarios.Usuario'); ?>
        <?php echo $this->Form->input('Usuario.email', ['type' => 'email', 'label' => false, 'placeholder' => 'E-mail', 'class' => 'form-control']); ?>
        <?php echo $this->Form->input('Usuario.nome', ['type' => 'text', 'label' => false, 'placeholder' => 'Nome', 'class' => 'form-control']); ?>
        <?php echo $this->Form->input('Usuario.assunto', ['type' => 'textarea', 'label' => false, 'placeholder' => 'Assunto', 'class' => 'form-control']); ?>
        <?php echo $this->Form->button(__('Enviar'), ['class' => 'btn btn-default']); ?>
        <?php echo $this->Form->end() ?>
    </div>
</div>