<?php
require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');

$clubs = getAllClubs();
$users = getAllUsers();

switch ($_GET['action']){
    
    case 'list' :
        $users = getAllUsers();
        require('views/user.php');
        break;

    case 'new' :
	    require('views/add_user.php');
        break;

    case 'signUp' :
        if (!empty($_POST)) {
            if (empty($_POST['username']) ||empty($_POST['email']) || empty($_POST['password']) || empty($_POST['club_id']) || empty($_POST['adress'])) {
                if (empty($_POST['email'])) {
                    $_SESSION['messages'][] = 'L\'email doit être renseigné';
                }
                if (empty($_POST['username'])) {
                    $_SESSION['messages'][] = 'L\'Username doit être renseigné!';
                }
                if (empty($_POST['club_id'])) {
                    $_SESSION['messages'][] = 'Il est obligatoire d\'appartenir a un club pour s\'inscrire !';
                }
                if (empty($_POST['adress'])) {
                    $_SESSION['messages'][] = 'Vous devez renseignez l\'adresse du club!';
                }
                if (empty($_POST['password'])) {
                    $_SESSION['messages'][] = 'Avoir un mot de passe est obligatoire';
                }
                header('Location:index.php?p=user&action=in');
                exit;
    
            } 
            else {
                $newUser = addUser();
                if ($newUser) {
                    $_SESSION['messages'][] = 'Bienvenue'.' '.$_SESSION['user']['username'].'!';
                    header('Location:index.php?p=user&action=in');
                    exit;
                } 
                else {
                    $_SESSION['messages'][] = "Erreur lors de l'inscription...";
    
                    header('Location:index.php?p=user&action=signUp');
                    exit;
                }
    
            }
        }
       
        break;

    case 'signIn' :
        
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                if (empty($_POST['email'])) {
                    $_SESSION['messages'][] = 'L\'email n\'a pas été renseigné';
                }
                if (empty($_POST['password'])) {
                    $_SESSION['messages'][] = 'Vous avez oubliez le mot de passe';
                }
                header('Location:index.php?p=user&action=signIn');
                exit;
    
            } 
            else { 
                $getIn = connectUser();
                
                if ($getIn) {
                    $_SESSION['messages'][] = 'Bienvenue'.' '.$_SESSION['user']['username'].'!';
                    header('Location:index.php?p=user&action=in');
                    exit;
                } 
                else {
                    $_SESSION['messages'][] = "Erreur lors de la connexion...";
                }
                header('Location:index.php?p=user&action=signIn');
                exit;
            }
        }
        break;

    case 'getOut' :
        unset($_SESSION['user']);
        header('Location:index.php?p=user&action=signIn');
        exit;
        break;
    
    default :
    
}
require('views/user.php');

