<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <?php echo $this->Flash->render('auth') ?>
    <?php echo $this->Form->create() ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password') ?></legend>
        <?php echo $this->Form->input('email') ?>
        <?php echo $this->Form->input('senha') ?>
    </fieldset>
    <?php echo $this->Form->button(__('Login')); ?>
    <?php echo $this->Form->end() ?>
</div>