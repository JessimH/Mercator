<?php

session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

require('helpers.php');

if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'player' :
            require 'controllers/playerController.php';
            break;
        
        case 'achat' :
            require 'controllers/achatController.php';
            break;

        case 'cart' :
            require 'controllers/cartController.php';
            break;

        case 'club' :
            require 'controllers/clubController.php';
            break;

        case 'admin' :
            require 'controllers/adminController.php';
            break;

        case 'mercato' :
            require 'controllers/mercatoController.php';
            break;

        case 'a-propos' :
            require 'controllers/a_proposController.php';
            break;

        case 'index' :
            require 'controllers/indexController.php';
            break;

        case 'user' :
            require 'controllers/userController.php';
            break;

        case '404' :
            require 'controllers/404Controller.php';
            break;

        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
}
