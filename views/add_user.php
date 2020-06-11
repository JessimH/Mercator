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

        <form class="col center" action="index.php?p=player&action=<?= isset($player) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

            <h2>Formulaire de l'Utilisateur :</h2>
            <input  type="text" name="username" id="" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['username'] : '' ?><?= isset($user) ? $user['username'] : '' ?>"/>

            <label for="is_admin">Admin :</label>
            <input type="radio" name="is_admin" id="no" >
            <label for="no">Yes</label>
            <input type="radio" name="is_admin" id="no">
            <label for="no">No</label>

            <label for="club">CLub</label>
            <select name="id_club" id="pet-id_club">
                <?php foreach ($clubs as $club): ?>
                    <option value="<?= $club['id']?>"<?php if(isset($_SESSION['user']) && $_SESSION['user']['club_id'] == $club['id']): ?>selected="selected"<?php endif; ?>><?= $club['name']?></option>
                <?php endforeach; ?>
            </select>
            
            <input class="btn-see" type="submit" value="Enregistrer" />
        </form>
    </section>
</body>

</html>