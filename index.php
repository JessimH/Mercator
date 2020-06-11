<?php
session_start();
require('helpers.php');

if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'player' :
            require 'controllers/playerController.php';
            break;

        case 'club' :
            require 'controllers/clubController.php';
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
        
        case 'admin' :
            require 'controllers/adminUserContoller.php';
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
