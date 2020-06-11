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

            <h2>Formulaire du joueur :</h2>
            <input  type="text" name="name" id="" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($player) ? $player['name'] : '' ?>"/>

            <label for="club">Club :</label>
            <select name="id_club" id="pet-id_club">
                <?php foreach ($clubs as $club): ?>
                    <option value="<?= $club['id']?>"<?php if(isset($_SESSION['user']) && $_SESSION['user']['club_id'] == $club['id']): ?>selected="selected"<?php endif; ?>><?= $club['name']?></option>
                <?php endforeach; ?>
            </select>

            <label class="" for="poste">Poste :</label>
            <select name="post_id" id="pet-post_id">
                <?php foreach ($postes as $poste): ?>
                    <option value="<?= $poste['id']?>"<?php if(isset($player) && $player['post_id'] == $poste['id']): ?>selected="selected"<?php endif; ?>><?= $poste['name']?></p></option>
                <?php endforeach; ?>
            </select>
             
            <label for="price">PRIX (en million €)</label>
            <input  type="number" name="price" id="" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($player) ? $player['price'] : '' ?>"/>

            <textarea id="" name="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($player) ? $player['description'] : '' ?></textarea>
            
            <label for="image">Image Portrait :</label>
            <input  type="file" name="image" id="image"/>

            <label for="image">Image Secondaire :</label>
            <input  type="file" name="image_desc" id="image"/>
            
            <input class="btn-see" type="submit" value="Enregistrer" />
        </form>
    </section>
</body>

</html>