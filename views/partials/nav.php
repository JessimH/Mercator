<nav>
    <p class="logo"><a href="index.php?p=index">Mercator.</a></p>
    <ul>
        <li><a href="index.php?p=index">Accueil</a></li>
        <li><a href="index.php?p=mercato&action=list">Mercato</a></li>
        <li><a href="index.php?p=a-propos">À Propos</a></li>
        <li><form method="GET" ><input class="searchbar" type="search" name="" id="" placeholder="Rechercher un joueur"></form></li>
        <li>
            <?php if(isset($_SESSION['user'])) :?>
                <a href="index.php?p=user&action=in">
                    <?php if(isset($_SESSION['user']['image'])) :?>
                    <img class="img-user" src="" alt="">
                    <?php else: ?>
                    <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                    <?php endif; ?>
                </a>
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