<div class="row carousel-holder">
    <?php
    $_banners_lateral_esquerda = $this->Pinheiro->listaBanners($divisao, 4);
    if (count($_banners_lateral_esquerda) > 0) {
        ?>
        <div class="col-md-12">
            <div class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <?php
                    foreach ($_banners_lateral_esquerda as $key => $value) {
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
            </div>
        </div>
        <?php
    }
    ?>
</div>