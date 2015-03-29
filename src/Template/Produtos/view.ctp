<!-- Portfolio Item Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= h($produto->nome) ?></h1>
    </div>
</div>
<!-- /.row -->

<!-- Portfolio Item Row -->
<div class="row">

    <div class="col-md-8">
        <img class="img-responsive" src="<?= $this->Url->build('/files/' . $this->Pinheiro->hasImage($produto->foto), true) ?>" alt="<?= h($produto->nome); ?>">
    </div>

    <div class="col-md-4">
        <h3><?= h($produto->nome) ?></h3>
        <p>Valor: <?= $this->Pinheiro->moeda($produto->valor) ?></p>
        <p>Categoria: <?= $produto->categoria->nome; ?></p>
        <p>Descrição: <?= $this->Text->autoParagraph(h($produto->descricao)); ?></p>
    </div>

</div>
<!-- /.row -->