<nav>
    <?php if(isset($_SESSION['user'])&& $_SESSION['user']['is_admin']==1) :?>
        <p class="logo"><a href="index.php?p=index">Mercator.<span style="color: red;">admin</span></a></p>
    <?php elseif(isset($_SESSION['user'])&& $_SESSION['user']['is_admin']==0) :?>
        <?php foreach($clubs as $club) :?>
            <?php if($club['id']==$_SESSION['user']['club_id']):?>
                <p class="logo"><a class="row center" href="index.php?p=index">Mercator. <img width="40" height="40" src="assets/images/clubs/<?= $club['image'] ?>" alt="<?= $club['name'] ?>"></a></p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="logo"><a href="index.php?p=index">Mercator.</a></p>
    <?php endif; ?>
    <ul>
        <li><a href="index.php?p=index">Accueil</a></li>
        <li><a href="index.php?p=mercato&action=list">Mercato</a></li>
        <li><a href="index.php?p=a-propos">À Propos</a></li>
        <li><form action="index.php?p=player&action=search" class="row center" method="post">
                <input class="searchbar" type="search" name="search" placeholder="Rechercher un joueur">
                <input style="opacity: 0;" type="submit" value="ok">
            </form>
        </li>
        <li>
            <?php if(isset($_SESSION['user'])&& $_SESSION['user']['is_admin']==0) :?>
                <?php foreach($clubs as $club) :?>
                    <?php if($club['id']==$_SESSION['user']['club_id']):?>
                        <a class="row center" href="index.php?p=user&action=in">
                            <p><?php echo count($_SESSION['cart']); ?></p>
                            <p style="font-size: 25px;" class="row center notif"><i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif(isset($_SESSION['user'])&& $_SESSION['user']['is_admin']==1) :?>
            <?php foreach($clubs as $club) :?>
                <?php if($club['id']==$_SESSION['user']['club_id']):?>
                    <a href="index.php?p=user&action=in">
                        <a href="index.php?p=user&action=in"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>    
            <?php else: ?>
                <a href="index.php?p=user&action=signIn"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a>
            <?php endif; ?>
        </li>
    </ul>
</nav>

<?php if(isset($_SESSION['messages'])): ?>
        <div class="message">
            <?php foreach($_SESSION['messages'] as $message): ?>
                <?= $message ?>
            <?php endforeach; ?>
        </div>
<?php endif; ?>