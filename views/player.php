<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php')
?>

<body id="body">
<?php 
    require ('partials/nav.php')
?>
    <section class="row content">

        <section class="col desc" style="background-image: url('assets/images/players/desc<?= $player['image_desc']?>');">
           <div class="row">
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']==0): ?>
                    <?php $key = array_search($player['id'], array_column($_SESSION['cart'], 'id')); ?>
                    <?php if(isset($_SESSION['cart'][$key]) && $_SESSION['cart'][$key]['id'] == $player['id']) :?>
                        <i class="fas fa-check-circle" style="color: #00B122; font-size: 2em;"></i>
                    <?php else :?>
                        <button id="add" <?php if( $player['id_club'] == $_SESSION['user']['club_id']):?> style="display: none;" <?php endif;?> onclick="window.location.href='./index.php?p=cart&action=new&id=<?= $player['id'] ?>'" class="add-to-cart ">+</button>
                    <?php endif; ?>
                <?php endif; ?>    
                <h1><?= $player['name'] ?></h1>
           </div>
            <h2><?= $player['description'] ?></h2>
            <h2 class="price"><?= $player['price'] ?>M €</h2>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']==0): ?>
                    <a class="btn-see" href="index.php?p=achat">Contacter le club</a>
                <?php endif; ?>
        </section>

    </section>
   

</body>

</html>