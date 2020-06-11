<!DOCTYPE html>
<html lang="en">

<?php 
    require ('partials/meta.php')
?>

<body>
<?php 
    require ('partials/nav.php')
?>
    <section class="row content">

        <?php 
            require ('partials/cart.php')
        ?>

        <section class="col desc" style="background-image: url('assets/images/players/desc<?= $player['image_desc']?>');">
           <div class="row">
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']==0): ?>
                    <button class="add-to-cart ">+</button>
                <?php endif; ?>
                <h1><?= $player['name'] ?></h1>
           </div>
            <h2><?= $player['description'] ?></h2>
            <h2 class="price"><?= $player['price'] ?>M €</h2>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']==0): ?>
                    <a class="btn-see" href="">Contacter le club</a>
                <?php endif; ?>
        </section>

    </section>

</body>

</html>