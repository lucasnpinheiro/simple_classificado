<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $this->fetch('title') ?></title>  
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
            <div class="container">
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
                        <li><?php echo $this->Html->link('Produtos', '/'); ?></li>
                        <li><?php echo $this->Html->link('Contato', '/contatos'); ?></li>
                        <li><?php echo $this->Html->link('Login', array('controller' => 'Usuarios', 'action' => 'login')); ?></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">



                <div class="col-md-3">
                    <p class="lead">Categorias</p>
                    <div class="list-group">
                        <?php
                        echo $this->Html->link('Todos', ['controller' => 'produtos', 'action' => 'index'], ['class' => 'list-group-item']);
                        foreach ($this->Pinheiro->categorias() as $key => $value) {
                            echo $this->Html->link($value->nome, ['controller' => 'produtos', 'action' => 'index', 'categoria' => $value->id], ['class' => 'list-group-item']);
                        }
                        ?>
                    </div>
                    <div class="row carousel-holder hidden-xs hidden-sm">

                        <?php
                        $_banners_lateral_esquerda = $this->Pinheiro->listaBanners(3);
                        if (count($_banners_lateral_esquerda) > 0) {
                            ?>
                            <div class="col-md-12">
                                <div id="banner_topo" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <?php
                                        foreach ($_banners_lateral_esquerda as $key => $value) {
                                            ?>
                                            <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                                                <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt="">
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>



                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="row carousel-holder">

                            <?php
                            $_banners_topo = $this->Pinheiro->listaBanners(1);
                            if (count($_banners_topo) > 0) {
                                ?>
                                <div class="col-md-12">
                                    <div id="banner_topo" class="carousel slide" data-ride="carousel">

                                        <div class="carousel-inner">
                                            <?php
                                            foreach ($_banners_topo as $key => $value) {
                                                ?>
                                                <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                                                    <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt="">
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>



                        </div>
                        <?php echo $this->Flash->render() ?>
                        <?php echo $this->fetch('content') ?>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.container -->

        <div class="container">

            <hr>
            <div class="row carousel-holder">

                <?php
                $_banners_rodape = $this->Pinheiro->listaBanners(2);
                if (count($_banners_rodape) > 0) {
                    ?>
                    <div class="col-md-12">
                        <div id="banner_topo" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <?php
                                foreach ($_banners_rodape as $key => $value) {
                                    ?>
                                    <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                                        <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt="">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>



            </div>
            <hr>
            <div class="text-right">Desenvolvido por <?= $this->Html->link('Agência Voxel', 'http://agenciavoxel.com.br') ?></div>

        </div>
        <!-- /.container -->

        <?php echo $this->Html->script('/js/jquery.js') ?>
        <?php echo $this->Html->script('/js/bootstrap.min.js') ?>
        <?php echo $this->fetch('script') ?>

    </body>

</html>
