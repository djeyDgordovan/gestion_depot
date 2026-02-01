<?php
include_once "_config/db.php";

// Récupération des données
$login = $_POST['login'];
$password = $_POST['password'];

// Récupération de l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->execute([$login, $login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    // Redirection selon rôle
    switch ($user['role']) {
        case 'admin':
            header("Location: admin/dashboard.php");
            break;
        case 'gestionnaire':
            header("Location: gestionnaire/dashboard.php");
            break;
        default:
            header("Location: vendeur/dashboard.php");
    }
    exit();
} else {
    echo "Identifiants incorrects";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex align-items-center">
        <div class="row w-100 shadow rounded overflow-hidden bg-white">

            <!-- Image à gauche -->
            <div class="col-md-6 d-none d-md-block p-0">
                <img
                    src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
                    class="img-fluid h-100 w-100 object-fit-cover"
                    alt="Connexion">
            </div>

            <!-- Formulaire à droite -->
            <div class="col-md-6 p-5">
                <h3 class="text-center mb-4">Connexion</h3>

                <form>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary">Se connecter</button>
                    </div>

                    <div class="text-center mt-3">
                        <small>
                            Pas encore de compte ?
                            <a href="inscription.php">Créer un compte</a>
                        </small>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>