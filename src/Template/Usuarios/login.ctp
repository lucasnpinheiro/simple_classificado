<div class="panel panel-default">
    <div class="panel-heading">Área Administrativa</div>
    <div class="panel-body">
        <?php echo $this->Flash->render('auth') ?>
        <?php echo $this->Form->create() ?>
        <?php echo $this->Form->input('email') ?>
        <?php echo $this->Form->input('senha', [ 'type' => 'password']) ?>
        <?php echo $this->Form->button(__('Login')); ?>
        <?php echo $this->Form->end() ?>
    </div>
</div>