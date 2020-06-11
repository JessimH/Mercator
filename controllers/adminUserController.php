<?php

require_once 'models/Players.php';
require_once 'models/Clubs.php';
require_once 'models/Users.php';

$clubs = getAllClubs();
$users = getAllUsers();


switch ($_GET['action']){
    case 'list' :
        $users = getAllUsers();
        require('views/user.php');
        break;

    case 'new' :
        $clubs = getAllClubs();
        $users = getAllUsers();
        
	    require('views/add_user.php');
        break;

    case 'add' :
        if(empty($_POST['username']) || empty($_POST['is_admin']) || empty($_POST['club_id'])){
        
            if(empty($_POST['username'])){
                $_SESSION['messages'][] = 'L\'Username est obligatoire !';
            }
            if(empty($_POST['id_club'])){
                $_SESSION['messages'][] = 'Le club est obligatoire !';
            }
            if(empty($_POST['is_admin'])){
                $_SESSION['messages'][] = 'Vous devez renseigner si L\'utilisateur est admin!';
            }
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?p=user&action=new');
            exit;
        }
        else{
            $resultAdd = addUser($_POST);
            if($resultAdd){
                var_dump($resultAdd);
                
                $_SESSION['messages'][] = 'Joueur enregistré !';
            }
            else{
                var_dump($resultAdd);
                die();
                $_SESSION['messages'][] = "Désolé, erreur, le joueur n\'a pas pus être ajouté...";
            }
            header('Location:index.php?p=user&action=list');
            exit;
        }
    break;

    case 'edit' :
        $clubs = getAllClubs();

        if(!empty($_POST)){
            if(empty($_POST['username']) || empty($_POST['is_admin']) || empty($_POST['club_id'])){
        
                if(empty($_POST['username'])){
                    $_SESSION['messages'][] = 'L\'Username est obligatoire !';
                }
                if(empty($_POST['id_club'])){
                    $_SESSION['messages'][] = 'Le club est obligatoire !';
                }
                if(empty($_POST['is_admin'])){
                    $_SESSION['messages'][] = 'Vous devez renseigner si L\'utilisateur est admin!';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?p=user&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                
                $result = updateUser($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'Utilisateur mis à jour !';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur,  l\'utilisateur n\'a pas pus être modifié...';
                }
                header('Location:index.php?p=user&action=list');
                exit;
            }
        }
        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $user = getUser($_GET['id']);
                    if($user == false){
                        header('Location:index.php?p=404');
                        exit;
                    }
                }
                else {
                    header('Location:index.php?p=user&action=list');
                    exit;
                }
            }
            $clubs = getAllClubs();
            require('views/add_user.php');
        }
        break;
    
    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deleteUser($_GET['id']);
        }
        else {
            header('Location:index.php?p=404');
            exit;
        }
        if($result){
            
            $_SESSION['messages'][] = 'Utilisateu supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, l\'utilisateur n\'a pas pus être supprimé...';
        }
        header('Location:index.php?p=user&action=list');
        exit;    
    break;

    default :
    
}
require('views/user.php');

