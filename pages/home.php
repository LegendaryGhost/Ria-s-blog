<div class="row">
    <div class="col-sm-8">
        <?php foreach(App\Table\Article::getLast() as $post){ ?>
        <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
        <p><em><?= $post->categorie; ?></em></p>
        <?= $post->extrait; ?>
        <?php } ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach(App\Table\Categorie::all() as $categorie){ ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>