<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php');
?>

<body id="body" class="index">
   <?php
   require ('partials/nav.php');
   ?>

    <section class="col center index-content">
        <h2>Bienvenue sur la première plateforme de vente et de rachat de joueurs de football au monde !</h2>
        <div class="row center sign">
            <h3>Vous êtes dirigeant ou faites partie du STAFF <br> d’un club professionnel?</h3>
            <?php if(isset($_SESSION['user'])) :?>
                <a class="btn-see" href="index.php?p=user&action=in">Espace utilisateur</a>
            <?php else:?>
                <a class="btn-see" href="index.php?p=user&action=signIn">Rejoindre la plateforme</a>
            <?php endif;?>

        </div>
    </section>
    
</body>

</html>