<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php');
?>

<body>
    <?php 
    require ('partials/nav.php');
    ?>

    <section class="row all-v center add-player">

        <img class="img-product" src="assets/images/mbappe.png" alt="">

        <form class="col center" action="index.php?p=club&action=<?= isset($club) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

            <h2>Formulaire du club :</h2>

            <label>Nom complet du Club :</label>
            <input  type="text" name="name" id="" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($club) ? $club['name'] : '' ?>"/>
            
            <label>Abbreviation du Club :</label>
            <input  type="text" name="abbreviation" id="" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['abbreviation'] : '' ?><?= isset($club) ? $club['abbreviation'] : '' ?>"/>

            <label for="image">Logo Club</label>
            <input  type="file" name="image" id="image"/>
            <input class="btn-see" type="submit" value="Enregistrer" />
        </form>
    </section>
</body>

</html>