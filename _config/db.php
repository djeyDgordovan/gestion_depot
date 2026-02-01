<?php
$host = "localhost";   // ou 127.0.0.1
$user = "root";        // utilisateur MySQL (par défaut root sous XAMPP)
$pass = "";            // mot de passe (souvent vide sous XAMPP)
$dbname = "depot_bd";  // le nom de ta base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Définir le mode d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
