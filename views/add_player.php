<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php');
?>

<body id="body">
    <?php 
    require ('partials/nav.php');
    ?>

    <section class="row center add-player">

        <form class="col center" action="index.php?p=player&action=<?= isset($player) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

            <h2>Formulaire du joueur :</h2>

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($player) ? $player['name'] : '' ?>" placeholder="name"/>
            </div>

            <div>
                <label for="club">Club :</label>
                <select name="id_club" id="pet-id_club">
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id']?>"<?php if(isset($_SESSION['user']) && $_SESSION['user']['club_id'] == $club['id']): ?>selected="selected"<?php endif; ?>><?= $club['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
                <label class="" for="poste">Poste :</label>
                <select name="post_id" id="pet-post_id">
                    <?php foreach ($postes as $poste): ?>
                        <option value="<?= $poste['id']?>"<?php if(isset($player) && $player['post_id'] == $poste['id']): ?>selected="selected"<?php endif; ?>><?= $poste['name']?></p></option>
                    <?php endforeach; ?>
                </select>  
            </div>

            <div>
               <label for="price">PRIX (en million €):</label>
                <input  type="number" name="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($player) ? $player['price'] : '' ?>"/>
            </div>
             
            <div class="row center">
                <label for="description">Description : </label>
                <textarea name="description" placeholder="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($player) ? $player['description'] : '' ?></textarea>  
            </div>

            <div>
                 <label for="image">Image Portrait :</label>
                <input  type="file" name="image" id="image"/>
            </div>

            <div>
                 <label for="image">Image Secondaire :</label>
                <input  type="file" name="image_desc" id="image"/>
            </div>
            
           

           
            
            <input class="btn-see" type="submit" value="Enregistrer" />
        </form>
    </section>

</body>

</html>