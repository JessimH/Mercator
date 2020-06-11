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
            require ('partials/cart.php');
        ?>

        <section id="up" class="row center categories ">
            <ul class="row categories-ul">
                <li class="row center all"><a id="cat" href='index.php?p=mercato&action=list'>ALL</a></li>
                <?php foreach ($postes as $poste) :?>
                    <li class="row center ">
                        <a id="cat" href='index.php?p=mercato&action=postId&id=<?= $poste['id'] ?>' >
                            <?= $poste['name'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="row categories-ul ">
            <li class="row center all"><a id="cat" href='index.php?p=mercato&action=list'>ALL</a></li>
                <?php foreach ($clubs as $club) :?>
                    <li class="row center">
                        <a id="cat" href='index.php?p=mercato&action=clubId&id=<?= $club['id'] ?>'>
                            <img src="assets/images/clubs/<?= $club['image']?>" alt="<?= $club['abbreviation'] ?>" class="icon ">
                        </a>
                    </li>
                <?php endforeach; ?>    
            </ul>
        </section>

        <section class="row product-list">
            <?php foreach($players as $player): ?>
                <div class="product-template ">
                    <div class="img-product row center">
                        <img src="assets/images/players/<?= $player['image'] ?>" height="215px" width="206px" alt="<?= $player['name'] ?>">
                    </div>
                    <?php if($_GET['action']=='list' || $_GET['action']=='clubId' || $_GET['action']=='postId' ) :?>
                        <?php foreach($clubs as $club) :?>
                            <?php if($club['id'] == $player['id_club']) :?>
                                <img src="assets/images/clubs/<?= $club['image']?>" width="30px" height="30px" alt="icon Club" class="icon">
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>
                    <div class="product-name ">
                        <h3><?= $player['name'] ?></h3>
                        <?php if($_GET['action']=='list' || $_GET['action']=='clubId' ) :?>
                            <?php foreach($postes as $poste) :?>
                                <?php if($poste['id'] == $player['post_id']) :?>
                                    <h3><?= $poste['name'] ?></h3>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php else: ?>
                            <h3><?= $playerPoste?></h3>
                        <?php endif; ?>
                    </div>
                    <div class="product-price ">
                        <h3><?= $player['price']?> M €</h3>

                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']==0): ?>
                            <button class="add-to-cart ">+</button>
                        <?php endif; ?>  
                        <a href="index.php?p=mercato&action=playerSelected&id=<?= $player['id'] ?>" class="btn-see">
                            voir plus
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    
    </section>

    <a class="up" href="#up">
        <i class="fa fa-arrow-circle-up fa-3x"></i>
    </a>

</body>

</html>