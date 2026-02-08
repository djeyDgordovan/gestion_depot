<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <div class="container-fluid position-relative d-flex justify-content-center align-items-center">

        <!-- BARRE DE RECHERCHE CENTRÉE -->
        <form class="w-50">
            <div class="input-group">
                <span class="input-group-text bg-light border-0">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search"
                       class="form-control border-0 bg-light"
                       placeholder="Rechercher une boisson..."
                       aria-label="Search">
            </div>
        </form>

        <!-- PROFIL À DROITE -->
        <div class="dropdown position-absolute end-0">
            <a href="#"
               class="d-flex align-items-center text-decoration-none dropdown-toggle"
               data-bs-toggle="dropdown"
               aria-expanded="false">

                <img src="assets/images/profile/profil_m.png"
                     alt="Profil"
                     width="42"
                     height="42"
                     class="rounded-circle border">

            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li class="px-3 py-2 text-muted small">
                    <i class="bi bi-person-circle me-1"></i> Connecté
                </li>
                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i> Mon profil
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-pencil-square me-2"></i> Modifier le profil
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-gear me-2"></i> Paramètres
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item text-danger" href="#">
                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>


