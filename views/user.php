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
            $players = getPlayersByClub($_SESSION['user']['club_id']);
            $club = getClub($_SESSION['user']['club_id']);
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