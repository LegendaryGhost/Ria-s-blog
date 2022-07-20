<?php

    $app = App::getInstance();
    $category = $app->getTable('category');

    $categorie = $app->getTable('category')->find($_GET['id']);
    if($categorie === false){
        $app->notFound();
    }
    $articles = $app->getTable('post')->lastByCategory($_GET['id']);
    $categories = $category->all();

?>

<h1><?= $categorie->titre; ?></h1>

<div class="row">
    <div class="col-sm-8">
        <?php foreach($articles as $post){ ?>
        <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
        <p><em><?= $post->categorie; ?></em></p>
        <?= $post->extrait; ?>
        <?php } ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach($categories as $categorie){ ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>