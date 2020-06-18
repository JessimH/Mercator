<?php

require_once 'models/Players.php';
require_once 'models/Postes.php';
require_once 'models/Clubs.php';
require_once 'models/Users.php';
require_once 'models/Cart.php';

$selectedClub = false;

$clubs = getAllClubs();

$selectedPoste = false;

$postes = getAllPostes();

switch ($_GET['action']){
    case 'list';
        $players = getAllPlayers();
        $postes = getAllPostes();
        $clubs = getAllClubs();
        $playersFromCart = $_SESSION['cart'];


    break;

    case 'clubId';
        $club = getClub($_GET['id']);
        $players = getPlayersByClub($club['id']); 
        $postes = getAllPostes();
        $playersFromCart = $_SESSION['cart'];


    break;

    case 'postId';
        $poste = getPoste($_GET['id']);
        $players = getPlayersByPostes($poste['id']);
        $playerPoste = $poste['name'];
        $playersFromCart = $_SESSION['cart'];

  
    break;  

    case 'playerSelected' :
        $player = getPlayer($_GET['id']); 
        $postes = getAllPostes();
        $playersFromCart = $_SESSION['cart'];


        require('views/player.php');
        exit;  

    break;

    default :
    
       
}

require('views/mercato.php');




