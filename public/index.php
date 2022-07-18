<?php

    use App\Autoloader;

    require '../App/Autoloader.php';

    Autoloader::register();

    if(isset($_GET['p'])) {
        $p = $_GET['p'];
    } else {
        $p = 'home';
    }

    ob_start();
    switch($p) {
        case 'home' :
            require '../pages/home.php';
            break;
        case 'article' :
            require '../pages/article.php';
            break;
        case 'categorie' :
            require '../pages/categorie.php';
            break;
    }
    $content = ob_get_clean();

    require '../pages/templates/default.php';

?>