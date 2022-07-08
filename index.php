<?php

require_once './autoload.php';
require_once './controllers/HomeController.php';
require_once './views/includes/alerts.php';

$home = new HomeController();

$myPages = ['home', 'add', 'delete', 'update', 'logout'];
$loginPages = ['register', 'login'];



if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    

    if (isset($_GET['page']) || isset($_GET[BASE_URL])) {
        if (in_array($_GET['page'], $myPages)) {


            require_once './views/includes/header.php';
            $page = $_GET['page'];
            $home->index($page);

            require_once './views/includes/footer.php';
        } else if (in_array($_GET['page'], $loginPages)) {
            $page = $_GET['page'];
            $home->index($page);

            require_once './views/includes/footer.php';
        } else {
            include './views/includes/404.php';
        }
    } else {
        // $home->index('home');
        Redirect::to(BASE_URL . "home");
    }
} else if (in_array($_GET['page'], $loginPages)) {
    $page = $_GET['page'];
    $home->index($page);

    require_once './views/includes/footer.php';
}
else{
    $home->index('login');
    echo '<script type="text/javascript">alert("you must sign in first")</script>';
}
?>