<?php include_once "includes/head.php" ?>

<body class="bg-light">

    <!-- HEADER -->

    <?php include_once "includes/header.php" ?>

    <!-- HEADER -->


    <!-- CONTENU -->
    <div class="container mt-4">

        <h3 class="mb-4">Boissons disponibles au dépôt</h3>

        <div class="row g-4">

            <!-- CARTE -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm"
                    role="button"
                    data-bs-toggle="modal"
                    data-bs-target="#venteCoca">

                    <img src="assets/images/3.webp" class="card-img-top p-3" alt="Coca Cola">

                    <div class="card-body">
                        <h5 class="card-title">Coca-Cola</h5>
                        <p class="card-text small">
                            <strong>Catégorie :</strong> Boisson sucrée<br>
                            <strong>Contenance :</strong> 50 cl<br>
                            <strong>Prix :</strong> 500 FCFA<br>
                            <strong>Stock :</strong> 120 bouteilles
                        </p>
                    </div>
                </div>
            </div>

            <?php include_once "includes/modal.php" ?>


        </div>
    </div>

    <?php include_once "includes/link.php" ?>
</body>