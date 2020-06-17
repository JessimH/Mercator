<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php');
?>

<body id="body">
    <?php 
    require ('partials/nav.php');
    ?>

    <section class="row all-v center add-player">

        <form class="col center" action="index.php?p=admin&action=<?= isset($user) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

            <h2>Formulaire de l'Utilisateur :</h2>
            <label for="username">Username : </label>
            <input  type="text" name="username" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['username'] : '' ?><?= isset($user) ? $user['username'] : '' ?>"/>

            <label for="is_admin">Admin :</label>
            <div class="col center"> 
                <div class="row center">
                    <input type="radio" name="is_admin" value="1" 
                        <?php if(isset($user) && $user['is_admin'] == 1): ?>
                            checked
                        <?php endif; ?>>
                    <label for="no">Yes</label>
                </div> 
                <div class="row center">
                    <input type="radio" name="is_admin" value="0"
                        <?php if(isset($user) && $user['is_admin'] == 0): ?>
                            checked
                        <?php endif; ?>>
                    <label for="no">No</label>
                </div>            
            </div>

            <?php if($_GET['action'] == 'new') :?>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="text" name="adress" placeholder="Adresse du club">
            <?php endif;?>

            <label for="club">CLub :</label>
            <select name="club_id" id="pet-id_club">
                <?php foreach ($clubs as $club): ?>
                    <option value="<?= $club['id']?>"<?php if(isset($_SESSION['user']) && $_SESSION['user']['club_id'] == $club['id']): ?>selected="selected"<?php endif; ?>><?= $club['name']?></option>
                <?php endforeach; ?>
            </select>
            
            <input class="btn-see" type="submit" value="Enregistrer" />
        </form>
    </section>
  
</body>

</html>