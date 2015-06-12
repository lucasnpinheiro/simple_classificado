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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.7853553817286!2d-47.842949!3d-21.2006841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b9bc1ffccb17eb%3A0x12c743788ab1a2a9!2sR.+Alfredo+Condeixa%2C+1319+-+Jardim+Marchesi%2C+Ribeir%C3%A3o+Preto+-+SP%2C+14031-300!5e0!3m2!1spt-BR!2sbr!4v1434070763329" height="200" frameborder="0" style="width: 100%; border:0"></iframe>
            </div>

            <hr />
            <!-- Address section -->
            <h4 class="title">Address</h4>
            <div class="address">
                <address>
                    <!-- Company name -->
                    <strong>Fabrica Pinheiro.</strong><br>
                    <!-- Address -->
                    Rua: Alfredo Condeixa, 1319<br>
                    Ribeirão Preto - SP | 14031-300<br>
                    <!-- Phone number -->
                    <abbr title="Phone">P:</abbr> (16) 30190418.
                </address>
            </div>
        </div>
    </div>
</div>