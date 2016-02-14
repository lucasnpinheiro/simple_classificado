<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
        if (isset($title)) {
            $this->assign('title', ' - ' . $title);
        } else {
            $this->assign('title', '');
        }
        ?>
        <title><?php echo \Cake\Core\Configure::read('Topo.Titulo') . $this->fetch('title') ?></title>  
        <?php echo $this->fetch('meta') ?>
        <?php echo $this->Html->css('/blue/css/bootstrap.min.css') ?>
        <?php echo $this->Html->css('/blue/css/flexslider.css') ?>
        <?php echo $this->Html->css('/blue/css/owl.carousel.css') ?>
        <?php echo $this->Html->css('/blue/css/font-awesome.min.css') ?>
        <?php echo $this->Html->css('/blue/css/style.css') ?>
        <?php echo $this->Html->css('/blue/css/blue.css') ?>

        <style>
            .topoPersonalizado{
                height: <?php echo \Cake\Core\Configure::read('Topo.Altura'); ?>;
                background-color: <?php echo \Cake\Core\Configure::read('Topo.Cor'); ?>;
                background-image: url('<?php echo $this->Url->build('/files/' . $this->Pinheiro->hasImage(\Cake\Core\Configure::read('Topo.Imagem')), true); ?>');
                background-repeat: no-repeat;
                background-position: <?php echo \Cake\Core\Configure::read('Topo.PosicaoX') ?> <?php echo \Cake\Core\Configure::read('Topo.PosicaoY') ?>; 
            }
            <?php echo \Cake\Core\Configure::read('Topo.Style'); ?>
        </style>
        <script type="text/javascript">
            var cms = {
                url: "<?php echo \Cake\Routing\Router::url('/', true); ?>"
            };
        </script>
    </head>

    <body>

        <!-- Header starts -->
        <header class="topoPersonalizado">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Logo. Use class "color" to add color to the text. -->
                        <div class="logo">
                            <h1><a class="navbar-brand" href="<?= $this->Url->build('/', true) ?>"><?php echo \Cake\Core\Configure::read('Topo.TituloLogo') ?> </a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--/ Header ends -->

    <!-- Navigation -->
    <div class="navbar bs-docs-nav" role="banner">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link('Pagina Inicial', '/'); ?></li>
                    <li class="dropdown">
                        <?php echo $this->Html->link('Produtos <span class="caret"></span>', ['plugin' => false, 'controller' => 'produtos', 'action' => 'index'], ['escape' => false, 'class' => "dropdown-toggle", 'data-toggle' => "dropdown", 'role' => "button", 'aria-expanded' => "false"]); ?>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            foreach ($this->Pinheiro->categorias() as $key => $value) {
                                echo '<li>' . $this->Html->link($value->nome, ['plugin' => false, 'controller' => 'produtos', 'action' => 'categoria', 'categoria' => $value->id]) . '</li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li><?php echo $this->Html->link('Contato', '/contatos'); ?></li>
                    <li><?php echo $this->Html->link('Blog', ['plugin' => 'Blogs', 'controller' => 'BlogsPosts', 'action' => 'index']); ?></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><?php echo $this->Html->link('Meus Pedidos', ['plugin' => false, 'controller' => 'Pedidos', 'action' => 'lista']); ?></li>
                    <?php if ($this->request->session()->read('Cliente.id')) { ?>
                        <li><?php echo $this->Html->link('Logout', ['plugin' => false, 'controller' => 'Clientes', 'action' => 'logout']); ?></li>
                        <li><?php echo $this->Html->link('Meu Carrinho', ['plugin' => false, 'controller' => 'PedidosProdutos', 'action' => 'index']); ?></li>

                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    <!--/ Navigation End -->



    <div class="carousel-holder">
        <?php
        $_banners_topo = $this->Pinheiro->listaBanners(null, 1);
        if (count($_banners_topo) > 0) {
            ?>
            <div>
                <div id="banner_topo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        foreach ($_banners_topo as $key => $value) {
                            ?>
                            <li  data-target="#banner_topo" data-slide-to="<?php echo $key; ?>" class="<?php echo $key === 0 ? 'active' : '' ?>"></li>
                            <?php
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        foreach ($_banners_topo as $key => $value) {
                            ?>
                            <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                                <?php if ($value->url != '') {
                                    ?>
                                    <a href="<?php echo $value->url; ?>">
                                        <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt=""  style="max-height: 150px;">
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt=""  style="max-height: 150px;">
                                <?php } ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#banner_topo" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#banner_topo" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Items -->
    <div class="items">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <?php echo $this->Flash->render() ?>
                    <?php echo $this->fetch('content') ?>
                </div>
                <div class="col-md-2 col-sm-3 hidden-xs">
                    <?php echo $this->element('banner_lateral', ['divisao' => 1]); ?>
                    <?php echo $this->element('banner_lateral', ['divisao' => 2]); ?>
                    <?php echo $this->element('banner_lateral', ['divisao' => 3]); ?>
                </div>


            </div>
        </div>
    </div>


    <!-- Footer starts -->
    <footer>
        <div class="container-fluid">
            <div class="carousel-holder">
                <?php
                $_banners_rodape = $this->Pinheiro->listaBanners(null, 2);
                if (count($_banners_rodape) > 0) {
                    ?>
                    <div>
                        <div id="banner_rodape" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php
                                foreach ($_banners_rodape as $key => $value) {
                                    ?>
                                    <li  data-target="#banner_rodape" data-slide-to="<?php echo $key; ?>" class="<?php echo $key === 0 ? 'active' : '' ?>"></li>
                                    <?php
                                }
                                ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                foreach ($_banners_rodape as $key => $value) {
                                    ?>
                                    <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                                        <?php if ($value->url != '') {
                                            ?>
                                            <a href="<?php echo $value->url; ?>">
                                                <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt="">
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <img class="slide-image" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($value->foto), true) ?>" alt="">
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#banner_rodape" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#banner_rodape" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="text-left col-xs-4"><?php echo $this->Html->link('Área Administrativa', array('controller' => 'Usuarios', 'action' => 'login')); ?></div>
                    <div class="text-center col-xs-4"><?php echo $this->Html->link('Blog', array('plugin' => 'Blogs', 'controller' => 'BlogsPages', 'action' => 'index')); ?></div>
                    <div class="text-right col-xs-4">Desenvolvido por <?= $this->Html->link('Agência Voxel', 'http://agenciavoxel.com.br') ?></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </footer> 	
    <!--/ Footer ends -->

    <!-- Scroll to top -->
    <span class="totop"><a href="index.html#"><i class="fa fa-chevron-up"></i></a></span> 

    <?php echo $this->Html->script('/blue/js/jquery.js') ?>
    <?php echo $this->Html->script('/blue/js/bootstrap.min.js') ?>
    <?php echo $this->Html->script('/blue/js/owl.carousel.min.js') ?>
    <?php echo $this->Html->script('/blue/js/filter.js') ?>
    <?php echo $this->Html->script('/blue/js/jquery.flexslider-min.js') ?>
    <?php echo $this->Html->script('/blue/js/respond.min.js') ?>
    <?php echo $this->Html->script('/blue/js/html5shiv.js') ?>
    <?php echo $this->Html->script('/blue/js/custom.js') ?>
    <?php echo $this->Html->script('/js/admin.js') ?>
    <?php echo $this->Html->script('/js/funcoes.js') ?>
    <?php echo $this->fetch('css') ?>
    <?php echo $this->fetch('script') ?>

</body>	
</html>