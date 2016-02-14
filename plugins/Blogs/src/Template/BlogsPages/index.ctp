<!-- Blog Post Content Column -->
<div class="panel panel-default">
    <div class="panel-heading">Paginas</div>
    <div class="panel-body">
        <?php foreach ($blogsPages as $blogsPage): ?>
            <div class="col-xs-12">
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?= h($blogsPage->titulo) ?></h1>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?= h($blogsPage->created) ?></p>

                <hr>

                <?= $blogsPage->conteudo ?>
                <hr>

            </div>
        <?php endforeach; ?>
    </div>
    <div class="panel-footer">
        <div class="paginator text-center">
            <ul class="pagination">
                <?= $this->Paginator->numbers(['prev' => '< ' . __('previous'), 'next' => __('next') . ' >']) ?>
            </ul>
        </div>
    </div>
</div>