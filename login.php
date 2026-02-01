<?php
include_once "_config/db.php";



?>


<?php include_once "includes/head.php"; ?>

<style>
    .login-container {
        height: 100vh;
    }

    .login-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<body>

    <div class="container-fluid login-container">
        <div class="row h-100">
            <!-- Image gauche -->
            <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
                <img src="https://source.unsplash.com/600x800/?technology" alt="Image connexion" class="login-image">
            </div>

            <!-- Formulaire droite -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="w-75">
                    <h2 class="mb-4 text-center">Connexion</h2>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                        <p class="mt-3 text-center">
                            Pas encore inscrit ? <a href="inscription.php">Créer un compte</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "includes/link.php"; ?>
</body>