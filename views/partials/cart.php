<section class="col cart">
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin']==0) :?>
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
                            <button class="btn-see">Club</button>
                            <button class="supp-from-cart">-</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col cart-buy center">
                <button class=" btn-buy ">Contactez tous les Clubs</button>
            </div>
    <?php elseif(isset($_SESSION['user'])&& $_SESSION['user']['is_admin']==1) :?>
        <div class="row center cart-content">
            <h2>En tant qu'Admin, vous n'avez pas accès a la liste des transferts</h2>      
        </div>
    <?php else:?>
        <div class="row center cart-content">
            <h2>Vous devez être engagé par un club pour pouvoir avoir accès à la lise des transferts</h2>      
        </div>
    <?php endif; ?>
</section>