<?php

require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');

switch ($_GET['action']){
    case 'list' :
        $clubs = getAllClubs();
        require('views/user.php');
        break;

    case 'new' :

        $clubs = getAllClubs();

	    require('views/add_club.php');
        break;

    case 'add' :
        if(empty($_POST['name']) || empty($_POST['abbreviation'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le nom est obligatoire !';
            }
            if(empty($_POST['abbreviation'])){
                $_SESSION['messages'][] = 'L\'Abbreviation du club est obligatoire !';
            }
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?p=user&action=new');
            exit;

        }
        else{
            $resultAdd = addClub($_POST);
            if($resultAdd){
                $_SESSION['messages'][] = 'Club enregistré !';
            }
            else{
                $_SESSION['messages'][] = "Désolé, erreur, le club n\'a pas pus être ajouté...";
            }
            header('Location:index.php?p=user&action=in');
            exit;
        }
        break;

    case 'edit' :
        $clubs = getAllClubs();

        if(!empty($_POST)){
            if(empty($_POST['name']) || empty($_POST['abbreviation'])){

                if(empty($_POST['name'])){
                    $_SESSION['messages'][] = 'Le nom est obligatoire !';
                }
                if(empty($_POST['abbreviation'])){
                    $_SESSION['messages'][] = 'L\'Abbreviation du club est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?p=user&action=edit&id='.$_GET['id']);
                exit;
            }
            else {
                
                $result = updateClub($_GET['id'], $_POST);
                if ($result) {
                    $_SESSION['messages'][] = 'Club mis à jour !';
                } else {
                    $_SESSION['messages'][] = 'Désolé, erreur,  le club n\'a pas pus être modifié...';
                }
                header('Location:index.php?p=user&action=in');
                exit;
            }
        }
        else{
            if(!isset($_SESSION['old_inputs'])){
                if(isset($_GET['id'])){
                    $club = getClub($_GET['id']);
                    if($club == false){
                        header('Location:index.php?p=404');
                        exit;
                    }
                }
                else {
                    header('Location:index.php?p=user&action=in');
                    exit;
                }
            }
            require('views/add_club.php');
        }
        break;

    case 'delete' :
        if(isset($_GET['id'])) {
            $result = deleteClub($_GET['id']);
        }
        else {
            header('Location:index.php?p=404');
            exit;
        }
        if($result){
            
            $_SESSION['messages'][] = 'Club supprimé !';
        }
        else{
            $_SESSION['messages'][] = 'Désolé, erreur,  le club n\'a pas pus être supprimé...';
        }
        header('Location:index.php?p=user&action=in');
        exit;    
        break;

   
    
    default :
        require 'controllers/indexController.php';
}
