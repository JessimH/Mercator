<?php

require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');
require('models/Cart.php');

switch ($_GET['action']){
    case 'list' :
        $users = getAllUsers();
        require('views/user.php');
        break;

    case 'new' :
        $users = getAllUsers();
        $clubs = getAllClubs();

	    require('views/add_user.php');
        break;

    case 'add' :
        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['adress']) || empty($_POST['club_id'])){

            if(empty($_POST['username'])){
                $_SESSION['messages'][] = 'L\'username est obligatoire !';
            }
            if(empty($_POST['email'])){
                $_SESSION['messages'][] = 'L\'email est obligatoire !';
            }
            if(empty($_POST['password'])){
                $_SESSION['messages'][] = 'Le mot de passe est obligatoire !';
            }
            if(empty($_POST['adress'])){
                $_SESSION['messages'][] = 'L\'adresse est obligatoire !';
            }
            if(empty($_POST['club_id'])){
                $_SESSION['messages'][] = 'Le club est obligatoire !';
            }
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?p=admin&action=new');
            exit;

        }
        else{
            $resultAdd = addUserAdmin($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Utilisateur ajouté !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, l\'utilisateur n\'a pas pus être ajouté...";
            }
            header('Location:index.php?p=user&action=in');
            exit;
        }
        break;

    case 'edit' :
        $clubs = getAllClubs();

        if(!empty($_POST)){
        if(empty($_POST['username'])|| empty($_POST['club_id'])){

            if(empty($_POST['username'])){
                $_SESSION['messages'][] = 'L\'username est obligatoire !';
            }
            if(empty($_POST['club_id'])){
                $_SESSION['messages'][] = 'Le club est obligatoire !';
            }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?p=admin&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                
                $result = updateUser($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'User mis à jour !';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur,  l\'utilisateur n\'a pas pus être modifié...';
                }
                header('Location:index.php?p=user&action=in');
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
                    header('Location:index.php?p=user&action=in');
                    exit;
                }
            }
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
            
            $_SESSION['messages'][] = 'User supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur,  l\'utilisateur n\'a pas pus être supprimé...';
        }
        header('Location:index.php?p=user&action=in');
        exit;    
        break;

   
    
    default :
    require 'controllers/404Controller.php';
}
