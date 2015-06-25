<div class="panel panel-default">
    <div class="panel-heading">Contato</div>
    <div class="panel-body">
        <div class="col-md-6">
            <?php echo $this->Form->create('Usuarios.Usuario'); ?>
            <?php echo $this->Form->input('Usuario.email', ['type' => 'email', 'label' => false, 'placeholder' => 'E-mail', 'class' => 'form-control']); ?>
            <?php echo $this->Form->input('Usuario.nome', ['type' => 'text', 'label' => false, 'placeholder' => 'Nome', 'class' => 'form-control']); ?>
            <?php echo $this->Form->input('Usuario.assunto', ['type' => 'textarea', 'label' => false, 'placeholder' => 'Assunto', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Enviar'), ['class' => 'btn btn-default']); ?>
            <?php echo $this->Form->end() ?>
        </div>
        <div class="col-md-6">
            <h4 class="title">Google Map</h4>
            <!-- Google maps -->
            <div class="gmap">
                <!-- Google Maps. Replace the below iframe with your Google Maps embed code -->
                    <iframe src="<?php echo \Cake\Core\Configure::read('Endereco.Mapa'); ?>" height="200" frameborder="0" style="width: 100%; border:0"></iframe>
            </div>

            <hr />
            <!-- Address section -->
            <h4 class="title">Endereço</h4>
            <div class="address">
                <address>
                    <?php echo \Cake\Core\Configure::read('Endereco.Fisico'); ?>
                </address>
            </div>
        </div>
    </div>
</div>