<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin - <?php echo $this->fetch('title') ?></title>  
        <?php echo $this->fetch('meta') ?>
        <?php echo $this->Html->css('/css/bootstrap.min.css') ?>
        <?php echo $this->Html->css('/css/shop-homepage.css') ?>
        <?php echo $this->fetch('css') ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Pinheiro Vassouras</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><?php echo $this->Html->link('Categorias', ['prefix' => 'admin', 'controller' => 'Categorias', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Produtos', ['prefix' => 'admin', 'controller' => 'Produtos', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Banners', ['prefix' => 'admin', 'controller' => 'Banners', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Usuários', ['prefix' => 'admin', 'controller' => 'Usuarios', 'action' => 'index']); ?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo $this->Html->link('Frente do Site', '/'); ?></li>
                        <li><?php echo $this->Html->link('Sair', ['controller' => 'Usuarios', 'action' => 'logout', 'prefix' => false]); ?></li>
                        <li><img src="<?= $this->Url->build('/img/user.png', true) ?>" alt="<?= $this->Session->read('Auth.User.nome'); ?>" title="<?= $this->Session->read('Auth.User.nome'); ?>"></li>
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
        <?php echo $this->fetch('script') ?>

    </body>

</html>
