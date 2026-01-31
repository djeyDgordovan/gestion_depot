<?php

$id_hotel = $_GET['id'] ?? 1;

// ===== 1. Récupération des photos depuis la BDD =====
$stmt = $pdo->prepare("SELECT url FROM photos WHERE id_hotel = ?");
$stmt->execute([$id_hotel]);
$photos = $stmt->fetchAll(PDO::FETCH_COLUMN);

// ===== 2. Récupération du nom de l'hôtel (pour trouver le dossier) =====
$stmt2 = $pdo->prepare("SELECT nom FROM hotels WHERE id = ?");
$stmt2->execute([$id_hotel]);
$hotel = $stmt2->fetch();

$hotelFolderName = strtolower(trim($hotel['nom']));
$hotelFolderName = preg_replace('/[^a-z0-9_-]/', '_', $hotelFolderName);

$uploadDir = "administrateur/uploads/hotels/" . $hotelFolderName . "/";

// ===== 3. Organisation des photos =====
$mainPhoto   = $photos[0] ?? null;   // Grande image à gauche
$sidePhoto1  = $photos[1] ?? null;   // Haute droite
$sidePhoto2  = $photos[2] ?? null;   // Haute droite 2

$bottomPhotos = array_slice($photos, 3, 5);  // Petites horizontales
$otherPhotos = array_slice($photos, 8);      // Pour le modal
$otherCount = count($otherPhotos);

?>

<style>
.overlay-text {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 0.5rem;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    text-align: center;
    font-size: 1rem;
    border-bottom-left-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
}

.position-relative img {
    border-radius: 0.5rem;
    cursor: pointer;
}
</style>

<script>
function openPhoto(src) {
    document.getElementById('photoModalImg').src = src;
    let modal = new bootstrap.Modal(document.getElementById('photoModal'));
    modal.show();
}
</script>

<div class="container py-4">
    <div class="row">
        <!-- Grande image à gauche -->
        <div class="col-md-8 mb-3">
            <?php if ($mainPhoto): ?>
            <a href="javascript:void(0)" onclick="openPhoto('<?= $uploadDir . $mainPhoto ?>')">
                <img src="<?= $uploadDir . $mainPhoto ?>" class="img-fluid rounded" alt="Hôtel principal">
            </a>
            <?php endif; ?>
        </div>

        <!-- Images verticales à droite -->
        <div class="col-md-4">
            <div class="mb-3">
                <?php if ($sidePhoto1): ?>
                <a href="javascript:void(0)" onclick="openPhoto('<?= $uploadDir . $sidePhoto1 ?>')">
                    <img src="<?= $uploadDir . $sidePhoto1 ?>" class="img-fluid rounded" alt="Entrée">
                </a>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <?php if ($sidePhoto2): ?>
                <a href="javascript:void(0)" onclick="openPhoto('<?= $uploadDir . $sidePhoto2 ?>')">
                    <img src="<?= $uploadDir . $sidePhoto2 ?>" class="img-fluid rounded" alt="Restaurant">
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Images horizontales en bas -->
    <div class="row mt-3">
        <?php foreach ($bottomPhotos as $photo): ?>
        <div class="col-6 col-md-2 mb-3">
            <a href="javascript:void(0)" onclick="openPhoto('<?= $uploadDir . $photo ?>')">
                <img src="<?= $uploadDir . $photo ?>" class="img-fluid rounded" alt="Photo">
            </a>
        </div>
        <?php endforeach; ?>

        <!-- Dernière image avec modal pour "+X photos" -->
        <?php if ($otherCount > 0): ?>
        <div class="col-6 col-md-2 mb-3 position-relative">
            <a href="#" data-bs-toggle="modal" data-bs-target="#photosModal" class="d-block">
                <img src="<?= $uploadDir . $bottomPhotos[4] ?>" class="img-fluid rounded" alt="Voir plus">
                <div class="overlay-text">+<?= $otherCount ?> photos</div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal principal pour toutes les images cliquées -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark">
            <div class="modal-body p-0">
                <img id="photoModalImg" src="" class="img-fluid w-100 rounded">
            </div>
        </div>
    </div>
</div>

<!-- Modal Bootstrap pour "Autres photos" -->
<div class="modal fade" id="photosModal" tabindex="-1" aria-labelledby="photosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photosModalLabel">Autres photos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php foreach ($otherPhotos as $photo): ?>
                    <div class="col-4 mb-3">
                        <a href="javascript:void(0)" onclick="openPhoto('<?= $uploadDir . $photo ?>')">
                            <img src="<?= $uploadDir . $photo ?>" class="img-fluid rounded" alt="Photo supplémentaire">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
