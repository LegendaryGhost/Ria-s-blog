<?php

use Modele\Autoloader;

    require '../modele/Autoloader.php';

    Autoloader::register();

    if(isset($_GET['p'])) {
        $p = $_GET['p'];
    } else {
        $p = 'home';
    }

    //Initialisation des données
    $db = new Modele\Database('blog');
    
    ob_start();
    switch($p) {
        case 'home' :
            require '../pages/home.php';
            break;
        case 'single' :
            require '../pages/single.php';
            break;
    }
    $content = ob_get_clean();

    require '../pages/templates/default.php';

?>