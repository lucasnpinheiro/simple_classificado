<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin - <?php echo \Cake\Core\Configure::read('Topo.Titulo') . ' - ' . $this->fetch('title') ?></title>  
        <?php echo $this->fetch('meta') ?>
        <?php echo $this->Html->css('/css/bootstrap.min.css') ?>
        <?php echo $this->Html->css('/css/shop-homepage.css') ?>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var cms = {
                url: "<?php echo \Cake\Routing\Router::url('/', true); ?>"
            };
        </script>
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->Url->build('/admin/usuarios', true) ?>"><?php echo \Cake\Core\Configure::read('Topo.Titulo') ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><?php echo $this->Html->link('Categorias', ['prefix' => 'admin', 'controller' => 'Categorias', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Produtos', ['prefix' => 'admin', 'controller' => 'Produtos', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Clientes', ['prefix' => 'admin', 'controller' => 'Clientes', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Pedidos', ['prefix' => 'admin', 'controller' => 'Pedidos', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Banners', ['prefix' => 'admin', 'controller' => 'Banners', 'action' => 'index']); ?></li>
                        <li class="dropdown">
                            <?php echo $this->Html->link('Blog <span class="caret"></span>', '#', ['escape' => false, 'class' => "dropdown-toggle", 'data-toggle' => "dropdown", 'role' => "button", 'aria-expanded' => "false"]); ?>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                echo '<li>' . $this->Html->link('Postagens', ['controller' => 'BlogsPosts', 'action' => 'index']) . '</li>';
                                echo '<li>' . $this->Html->link('Painas', ['controller' => 'BlogsPages', 'action' => 'index']) . '</li>';
                                ?>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link('Usuários', ['prefix' => 'admin', 'controller' => 'Usuarios', 'action' => 'index']); ?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo $this->Html->link('Frente do Site', '/', ['target' => '_blank']); ?></li>
                        <li class="dropdown">
                            <?php echo $this->Html->link($this->request->session()->read('Auth.User.nome') . ' <span class="caret"></span>', '#', ['escape' => false, 'class' => "dropdown-toggle", 'data-toggle' => "dropdown", 'role' => "button", 'aria-expanded' => "false"]); ?>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                echo '<li>' . $this->Html->link('Configurações', ['controller' => 'Configuracoes', 'action' => 'index']) . '</li>';
                                echo '<li>' . $this->Html->link('Perfil', ['controller' => 'Usuarios', 'action' => 'edit', $this->request->session()->read('Auth.User.id')]) . '</li>';
                                echo '<li>' . $this->Html->link('Sair', ['controller' => 'Usuarios', 'action' => 'logout', 'prefix' => false]) . '</li>';
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
            <div class="col-xs-12">
                <div class="row">
                    <?php echo $this->Flash->render() ?>
                    <?php echo $this->fetch('content') ?>
                </div>

            </div>

        </div>

        <!-- /.container -->

        <div class="container-fluid">

            <hr>
            <div class="text-right">Desenvolvido por <?= $this->Html->link('Agência Voxel', 'http://agenciavoxel.com.br') ?></div>

        </div>
        <!-- /.container -->

        <?php echo $this->Html->script('/js/jquery.js') ?>
        <?php echo $this->Html->script('/js/bootstrap.min.js') ?>
        <?php echo $this->Html->script('/js/admin.js') ?>
        <?php echo $this->Html->script('/js/funcoes.js') ?>
        <?php echo $this->fetch('css') ?>
        <?php echo $this->fetch('script') ?>

    </body>

</html>
