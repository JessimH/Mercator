<section class="row all-v user">
    <div class="row user-info">
    <?php if($_SESSION['user']['is_admin']== 1) :?>
        <div class="user-img row center"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
    <?php else:?>
        <?php foreach ($clubs as $club) :?>
            <?php if($club['id'] == $_SESSION['user']['club_id']) :?>
            <div class="user-img row center"><img width="100" height="100" src="assets/images/clubs/<?= $club['image'] ?>" alt="<?= $club['name'] ?>"></div>
            <?php endif;?>
        <?php endforeach; ?>
    <?php endif;?>
        <div class="col">
            <h2><?= $_SESSION['user']['username'] ?></h2>
            <?php if($_SESSION['user']['is_admin']== 1) :?>
                <h3>ADMIN</h3>
            <?php else:?>   
                <?php foreach ($clubs as $club) :?> 
                    <?php if($club['id'] == $_SESSION['user']['club_id']) :?>
                        <h3><?= $club['abbreviation'] ?></h3>
                    <?php endif;?>
                <?php endforeach; ?>
            <?php endif;?>
            <a class="btn-deco" href="index.php?p=user&action=getOut">Deconnexion</a>
        </div>
    </div>

    <div class="col player-list">
        <div class="col cart-title">
            <?php if($_SESSION['user']['is_admin']== 1) :?>
                <h2>Liste des Clubs partenaires</h2>
            <?php else:?>
                <h2>Joueurs placés sur le marché</h2>
            <?php endif;?>
            <hr>
        </div>
        <div class="col cart-content">
            <ul>
                <li>
                    <?php if($_SESSION['user']['is_admin']== 1) :?>
                        <?php foreach ($clubs as $club) :?>
                            <div class="row center product-cart" style="justify-content: space-between;">
                                <h3><?= $club['name'] ?></h3>
                                <button onclick="window.location.href='./index.php?p=club&action=edit&id=<?= $club['id'] ?>'" class="btn-update">update</button>
                                <button onclick="window.location.href='./index.php?p=club&action=delete&id=<?= $club['id'] ?>'" class="supp-from-cart">-</button>
                            </div>
                        <?php endforeach; ?>
                    <?php else:?>
                        <?php foreach ($playersUser as $player) :?>
                            <div class="row center product-cart" style="justify-content: space-between;">
                                <h3><?= $player['name'] ?></h3>
                                <h3><?= $player['price'] ?>M</h3>
                                <button onclick="window.location.href='./index.php?p=player&action=edit&id=<?= $player['id'] ?>'" class="btn-update">update</button>
                                <button onclick="window.location.href='./index.php?p=player&action=delete&id=<?= $player['id'] ?>'" class="supp-from-cart">-</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif;?>
                </li>
            </ul>
        </div>
        <div class="col cart-buy center">
        <?php if($_SESSION['user']['is_admin']== 1) :?>
            <button onclick="window.location.href='./index.php?p=club&action=new'" class="btn-buy">Ajouter un club</button>
        <?php else:?>
            <button onclick="window.location.href='./index.php?p=player&action=new'" class="btn-buy">Ajouter un joueur</button>
        <?php endif;?>
        </div>
    </div>

    <div class="col player-list">
        <div class="col user-cart">
            <?php if($_SESSION['user']['is_admin'] == 1):?>
                <div class="col cart-title">
                    <h2>Liste des utilisateurs</h2>
                    <h2>1 = admin</h2>
                    <hr>
                </div>
            <div class="col cart-content">
                <ul>
                    <li>
                        <?php foreach ($users as $user) :?>
                            <div class="row center product-cart" style="justify-content: space-between;">
                                <h3><?= $user['is_admin'] ?></h3>
                                <h3><?= $user['username'] ?></h3>
                                <?php foreach ($clubs as $club) :?>
                                    <?php if($club['id'] == $user['club_id']) :?>
                                        <h3><?= $club['abbreviation'] ?></h3>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <button onclick="window.location.href='./index.php?p=admin&action=edit&id=<?= $user['id'] ?>'" class="btn-update">update</button>
                                <button onclick="window.location.href='./index.php?p=admin&action=delete&id=<?= $user['id'] ?>'" class="supp-from-cart">-</button>
                            </div>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
            <div class="col cart-buy center">
                <button onclick="window.location.href='./index.php?p=admin&action=new'" class=" btn-buy ">ajouter un utilisateur</button>
            </div>
        <?php else:?>
            <div class="col cart-title">
                <h2>Joueurs sélectionné pour transfert</h2>
                <hr>
            </div>
            <div class="col cart-content">
                <ul>
                    <li>
                        <?php foreach($playersFromCart as $cartPlayer):?>
                            <?php foreach($clubs as $club) :?>
                                <?php foreach($players as $player) :?>
                                    <?php if($player['id'] == $cartPlayer['id']) :?>
                                        <?php if($club['id'] == $player['id_club']) :?>
                                            <div class="row center product-cart">
                                                <img style="margin-right: 10px;" src="assets/images/clubs/<?= $club['image']?>" width="25" height="25" alt="icon Club" class="icon">
                                                <h3><?= $player['name']?></h3>
                                                <?php foreach($postes as $poste) :?>
                                                    <?php if($poste['id'] == $player['post_id']):?>
                                                        <h3><?= $poste['name'] ?></h3>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                                <h3><?= $player['price']?> M</h3>
                                                <button onclick="window.location.href='./index.php?p=cart&action=del&id=<?= $player['id'] ?>'" class="supp-from-cart">-</button>
                                            </div>
                                        <?php endif;?>
                                    <?php endif;?>   
                                <?php endforeach;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </li>
                </ul>
            </div>
            <div class="col cart-buy center">
                <button onclick="window.location.href='./index.php?p=achat'" class=" btn-buy ">Contactez tous les Clubs</button>
            </div>
        <?php endif; ?>
    </div>
    </div>
    

</section>