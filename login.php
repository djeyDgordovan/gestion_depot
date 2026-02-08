<?php
session_start();
require_once "_config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email    = trim($_POST["email"]);
    $password = $_POST["password"];

    // Récupérer l'utilisateur
    $sql = "SELECT * FROM utilisateur WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification
    if (!$user || !password_verify($password, $user["password"])) {
        $error = "Email ou mot de passe incorrect.";
    } else {

        // Stocker infos en session
        $_SESSION["user_id"]   = $user["id"];
        $_SESSION["user_nom"]  = $user["nom"];
        $_SESSION["user_role"] = $user["role"];

        // Redirection selon rôle
        if ($user["role"] === "admin") {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: vendeur/dashboard.php");
        }
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
</head>

<body>

    <div class="container-fluid login-container">
        <div class="row h-100">

            <!-- Image gauche -->
            <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
                <img src="assets/images/1.jfif"
                    alt="Image connexion"
                    class="login-image">
            </div>

            <!-- Formulaire droite -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="w-75">

                    <h2 class="mb-4 text-center">Connexion</h2>

                    <!-- Message erreur -->
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                class="form-control"
                                name="email"
                                placeholder="Votre email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password"
                                class="form-control"
                                name="password"
                                placeholder="Votre mot de passe"
                                required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox"
                                class="form-check-input"
                                id="remember"
                                name="remember">
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Se connecter
                        </button>

                        <p class="mt-3 text-center">
                            Pas encore inscrit ?
                            <a href="inscription.php">Créer un compte</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>

</body>

</html>