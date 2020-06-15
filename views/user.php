<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php');
?>

<body>

    <?php 
        require ('partials/nav.php');
    ?>

    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'in'){
            $playersUser = getPlayersByClub($_SESSION['user']['club_id']);
            $postes = getAllPostes();
            $players = getAllPlayers();
            $club = getClub($_SESSION['user']['club_id']);
            $playersFromCart = $_SESSION['cart'];
            
            require ('partials/userPage.php');
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'signUp'){
            require ('partials/signUp.php');
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'signIn'){
            require ('partials/signIn.php');
        }
    ?>     

</body>

</html>