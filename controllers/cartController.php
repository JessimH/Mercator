<?php

require_once 'models/Clubs.php';
require_once 'models/Users.php';
require_once 'models/Cart.php';
require_once 'models/Postes.php';
require_once 'models/Players.php';

$users = getAllUsers();

$selectedClub = false;

$clubs = getAllClubs();

$players = getAllPlayers();

$selectedPoste = false;

$postes = getAllPostes();

if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        
        case 'list' :
            
            $id = $_SESSION['user']['id'];

            if($_GET['p']=='user'){
                $users = getAllUsers();
                $postes = getAllPostes();
                $playersFromCart = $_SESSION['cart'];
                
                require('views/user.php');
            }
            else{
                $postes = getAllPostes();
                $playersFromCart = $_SESSION['cart'];

                require('views/mercato.php');
            }
            
        break;

        case 'new' :
            $playersFromCart = $_SESSION['cart'];
            $playerCart = addToCart($_GET['id']);
           
            header('Location:index.php?p=cart&action=list');
        break;

        case 'del' :
            
            $playersFromCart = deleteFromCart($_GET['id']);

            header('Location:index.php?p=user&action=in&id='.$_GET['id']);
        break;

        default :
            require 'controllers/404Controller.php';
    }
}