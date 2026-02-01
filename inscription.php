<?php 
include_once "_config/db.php";

// Récupération des données
$nom = $_POST['nom'];
$username = $_POST['username'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Sécurisation du rôle
$role = $_POST['role'];
$rolesAutorises = ['vendeur', 'gestionnaire'];
if (!in_array($role, $rolesAutorises)) {
    $role = 'vendeur';
}

// Vérification si username ou email existe
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->execute([$username, $email]);
if ($stmt->rowCount() > 0) {
    die("Le nom d'utilisateur ou l'email existe déjà.");
}

// Insertion
$stmt = $pdo->prepare("INSERT INTO users (nom, username, email, telephone, password, role) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$nom, $username, $email, $telephone, $password, $role]);

header("Location: home_page.php");
exit();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center">
    <div class="row w-100 shadow rounded overflow-hidden bg-white">

        <!-- Image à gauche -->
        <div class="col-md-6 d-none d-md-block p-0">
            <img
                src="https://images.unsplash.com/photo-1556761175-4b46a572b786"
                class="img-fluid h-100 w-100 object-fit-cover"
                alt="Inscription"
            >
        </div>

        <!-- Formulaire à droite -->
        <div class="col-md-6 p-5">
            <h3 class="text-center mb-4">Créer un compte</h3>

            <form>
                <div class="mb-3">
                    <label class="form-label">Nom complet</label>
                    <input type="text" class="form-control" placeholder="Votre nom" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Votre email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" placeholder="Mot de passe" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" placeholder="Confirmation" required>
                </div>

                <!-- Sélection du rôle -->
                <div class="mb-4">
                    <label class="form-label">Rôle</label>
                    <select class="form-select" required>
                        <option value="">-- Sélectionner un rôle --</option>
                        <option value="vendeur">Vendeur</option>
                        <option value="administrateur">Administrateur</option>
                    </select>
                </div>

                <div class="d-grid">
                    <button class="btn btn-success">S'inscrire</button>
                </div>

                <div class="text-center mt-3">
                    <small>
                        Déjà un compte ?
                        <a href="login.php">Se connecter</a>
                    </small>
                </div>
            </form>
        </div>

    </div>
</div>

</body>
</html>
