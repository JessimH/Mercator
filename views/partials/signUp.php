<section class="col center form">
    <div class="signUp-form">
        <h1>S'inscrire</h1>
        <form class="col center" action="index.php?p=user&action=signUp" method="post">

            <input type="text" name="username" placeholder="Username">

            <input type="password" name="password" placeholder="Password">

            <input type="email" name="email" placeholder="Email">

            <select name="club_id" id="pet-post_id">

                <?php foreach ($clubs as $club): ?>
                    <option value="<?= $club['id']?>"><?= $club['name']?></option>
                <?php endforeach; ?>

            </select>

            <input type="text" name="adress" placeholder="Adresse du club">

            <button class="btn-see" type="submit">S'inscrire</button>
            
            <p>Vous avez déjà un compte?<a href="index.php?p=user&action=signIn">connectez vous</a></p>

        </form>
    </div>
    <img class="user-form-img2" src="assets/images/kimpembe2.png" alt="Kimpembe">
</section>