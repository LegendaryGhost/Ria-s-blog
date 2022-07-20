<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    extract($_GET);
} else {
    $page = 'home';
}

ob_start();
switch ($page) {
    case 'home':
        require ROOT . '/pages/posts/home.php';
        break;
    case 'posts.show':
        require ROOT . '/pages/posts/show.php';
        break;
    case 'posts.category':
        require ROOT . '/pages/posts/category.php';
        break;
}
$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';
