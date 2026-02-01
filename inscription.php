<?php
session_start();
require_once "_config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom     = trim($_POST["nom"]);
    $prenom  = trim($_POST["prenom"]);
    $email   = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role    = $_POST["role"];

    // Vérification mot de passe
    if ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {

        // Vérifier si email existe déjà
        $check = $pdo->prepare("SELECT id FROM utilisateur WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            $error = "Cet email est déjà utilisé.";
        } else {

            // Hachage du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insertion
            $sql = "INSERT INTO utilisateur (nom, prenom, email, password, role)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $nom,
                $prenom,
                $email,
                $hashedPassword,
                $role
            ]);

            // Stocker rôle en session
            $_SESSION["user_role"] = $role;

            // Redirection selon le rôle
            if ($role === "admin") {
                header("Location: admin/index.php");
            } else {
                header("Location: vendeur/index.php");
            }
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid vh-100">
    <div class="row h-100">

        <!-- Image à gauche -->
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <img src="https://via.placeholder.com/400x500" class="img-fluid rounded" alt="Inscription">
        </div>

        <!-- Formulaire -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="w-75">
                <h2 class="mb-4 text-center">Inscription</h2>

                <!-- Message erreur -->
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmer mot de passe</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rôle</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Choisir --</option>
                            <option value="admin">Administrateur</option>
                            <option value="vendeur">Vendeur</option>
                        </select>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary">S'inscrire</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>
