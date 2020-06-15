<?php
require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');
require('models/Cart.php');

$clubs = getAllClubs();
$users = getAllUsers();
$players = getAllPlayers();

switch ($_GET['action']){
    case 'search' :
        $player = getPlayerByName();

        if(empty($player)){
            header('Location:index.php?p=404');
        }
        $postes = getAllPostes();

        $playersFromCart = $_SESSION['cart'];
        
        require('views/player.php');
        break;


    case 'list' :
        $players = getAllPlayers();
        $postes = getAllPostes();
        $playersFromCart = $_SESSION['cart'];

        require('views/user.php');
        break;

    case 'new' :
        $idClub = $_SESSION['user']['club_id'];

        $userClub = getClub($idClub);

        $clubs = getAllClubs();
        $postes = getAllPostes();
	    require('views/add_player.php');
        break;

    case 'add' :
        if(empty($_POST['name']) || empty($_POST['id_club']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['post_id'])){
		
            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            if(empty($_POST['id_club'])){
                $_SESSION['messages'][] = 'Le club est obligatoire !';
            }
            if(empty($_POST['description'])){
                $_SESSION['messages'][] = 'La description est obligatoire !';
            }
            if(empty($_POST['price'])){
                $_SESSION['messages'][] = 'Le prix est obligatoire !';
            }
            if(empty($_POST['post_id'])){
                $_SESSION['messages'][] = 'Le poste est obligatoire !';
            }
            
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?p=user&action=new');
            exit;
        }
        else{
            $resultAdd = addPlayer($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Joueur enregistré !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, le joueur n\'a pas pus être ajouté...";
            }
            header('Location:index.php?p=user&action=in');
            exit;
        }
        break;

    case 'edit' :
        $idClub = $_SESSION['user']['club_id'];

        $userClub = getClub($idClub);

        $clubs = getAllClubs();

        $postes = getAllPostes();
        if(!empty($_POST)){
            if(empty($_POST['name']) || empty($_POST['id_club']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['post_id'])){

                if(empty($_POST['name'])){
                    $_SESSION['messages'][] = 'Le nom est obligatoire !';
                }
                if(empty($_POST['id_club'])){
                    $_SESSION['messages'][] = 'Le club est obligatoire !';
                }
                if(empty($_POST['description'])){
                    $_SESSION['messages'][] = 'La description est obligatoire !';
                }
                if(empty($_POST['price'])){
                    $_SESSION['messages'][] = 'Le prix est obligatoire !';
                }
                if(empty($_POST['post_id'])){
                    $_SESSION['messages'][] = 'Le poste est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?p=user&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                
                $result = updatePlayer($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'Joueur mis à jour !';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur,  le joueur n\'a pas pus être modifié...';
                }
                header('Location:index.php?p=user&action=in');
                exit;
            }
        }
        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $player = getPlayer($_GET['id']);
                    if($player == false){
                        header('Location:index.php?p=404');
                        exit;
                    }
                }
                else {
                    header('Location:index.php?p=user&action=in');
                    exit;
                }
            }
            $postes = getAllPostes();
            require('views/add_player.php');
        }
        break;

    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deletePlayer($_GET['id']);
        }
        else {
            header('Location:index.php?p=404');
            exit;
        }
        if($result){
            
            $_SESSION['messages'][] = 'Joueur supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur,  le joueur n\'a pas pus être supprimé...';
        }
        header('Location:index.php?p=user&action=in');
        exit;    
        break;

   
    
    default :
        require 'controllers/404Controller.php';
}
