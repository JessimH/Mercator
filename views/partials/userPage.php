<section class="row all-v user">
    <div class="row user-info">
        <div class="user-img row center"></div>
        <div class="col">
            <h2><?= $_SESSION['user']['username'] ?></h2>
            <?php if($_SESSION['user']['is_admin']== 1) :?>
                <h3>ADMIN</h3>
            <?php else:?>    
                <h3><?= $club['abbreviation'] ?></h3>
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
                    <?php foreach ($players as $player) :?>
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

    <div class="col user-cart">
        <?php if($_SESSION['user']['is_admin'] == 1):?>
            <div class="col cart-title">
                <h2>Liste des utilisateurs</h2>
                <hr>
            </div>
            <div class="col cart-content">
                <ul>
                    <li>
                        <div class="row center product-cart">
                            <h3>admin</h3>
                            <h3>username</h3>
                            <h3>club</h3>
                            <button class="btn-update">update</button>
                            <button onclick="window.location.href='./index.php?p=user&action=new'" class="supp-from-cart">-</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col cart-buy center">
                <button class=" btn-buy ">ajouter un utilisateur</button>
            </div>
        <?php else:?>
            <div class="col cart-title">
                <h2>Joueurs sélectionné pour transfert</h2>
                <hr>
            </div>
            <div class="col cart-content">
                <ul>
                    <li>
                        <div class="row center product-cart">
                            <h3>NOM DE FAMILLE</h3>
                            <h3>A</h3>
                            <button class="btn-see">Agent</button>
                            <button class="supp-from-cart">-</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col cart-buy center">
                <button class=" btn-buy ">Contactez les Agents</button>
            </div>
        <?php endif; ?>
    </div>

</section>