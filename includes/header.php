<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">CongoBooKing</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="destination.php">Destination</a></li>
        <li class="nav-item"><a class="nav-link" href="apropos.php">A propos</a></li>
      </ul>
    </div>

    <!-- Zone de droite -->
    <div class="d-flex align-items-center">
      <?php if (isset($_SESSION['utilisateur'])): ?>
        <div class="dropdown">
          <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" href="#" role="button"
            data-bs-toggle="dropdown">
            <img src="assets/images/profile/profil_m.png" alt="Profil"
              style="width:32px; height:32px; border-radius:50%; margin-right:8px;">
            <strong style="font-size: 14px;">
              <?= htmlspecialchars($_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom']); ?>
            </strong>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow-sm">
            <?php if (isset($_SESSION['utilisateur']['role']) && $_SESSION['utilisateur']['role'] === 'admin'): ?>
              <li><a class="dropdown-item" href="administrateur/index.php">Espace Admin</a></li>
            <?php else: ?>
              <li><a class="dropdown-item" href="profile.php">Profil</a></li>
            <?php endif; ?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="deconnexion.php">Déconnexion</a></li>
          </ul>
        </div>
      <?php else: ?>
        <a href="inscription.php" class="btn btn-outline-light btn-custom me-2">S'inscrire</a>
        <a href="connexion.php" class="btn btn-light btn-custom">Se connecter</a>

      <?php endif; ?>
    </div>
  </div>
</nav>