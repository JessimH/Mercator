<?php

require_once 'models/Players.php';
require_once 'models/Postes.php';
require_once 'models/Clubs.php';
require_once 'models/Users.php';

$selectedClub = false;

$clubs = getAllClubs();

$selectedPoste = false;

$postes = getAllPostes();

switch ($_GET['action']){
    case 'list';
        $players = getAllPlayers();
       
    break;

    case 'clubId';

        $club = getClub($_GET['id']);
        $players = getPlayersByClub($club['id']); 

    break;

    case 'postId';

        $poste = getPoste($_GET['id']);
        $players = getPlayersByPostes($poste['id']);
        $playerPoste = $poste['name'];
        
    break;  

    case 'playerSelected' :

        $player = getPlayer($_GET['id']); 
        require('views/player.php');
        exit;  

    break;

    default :
       
}

require('views/mercato.php');




