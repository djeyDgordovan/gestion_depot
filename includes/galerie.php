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
    }
</style>

<div class="container py-4">
    <div class="row">
        <!-- Grande image à gauche -->
        <div class="col-md-8 mb-3">
            <a href="asstes/images/Mikheal's/1.jpg" class="text-decoration-none">
                <img src="assets/images/Mikheal's/1.jpg" class="img-fluid rounded" alt="Hôtel principal">
            </a>
        </div>

        <!-- Images verticales à droite -->
        <div class="col-md-4">
            <div class="mb-3">
                <img src="assets/images/Mikheal's/2.jpg" class="img-fluid rounded" alt="Entrée">
            </div>
            <div class="mb-3">
                <img src="assets/images/Mikheal's/3.jpg" class="img-fluid rounded" alt="Restaurant">
            </div>
        </div>
    </div>

    <!-- Images horizontales en bas -->
    <div class="row mt-3">
        <div class="col-6 col-md-2 mb-3">
            <img src="assets/images/Mikheal's/4.jpg" class="img-fluid rounded" alt="Chambre 1">
        </div>
        <div class="col-6 col-md-2 mb-3">
            <img src="assets/images/Mikheal's/5.jpg" class="img-fluid rounded" alt="Chambre 2">
        </div>
        <div class="col-6 col-md-2 mb-3">
            <img src="assets/images/Mikheal's/6.jpg" class="img-fluid rounded" alt="Chambre 3">
        </div>
        <div class="col-6 col-md-2 mb-3">
            <img src="assets/images/Mikheal's/8.jpg" class="img-fluid rounded" alt="Chambre 4">
        </div>
        <div class="col-6 col-md-2 mb-3">
            <img src="assets/images/Mikheal's/9.webp" class="img-fluid rounded" alt="Chambre 5">
        </div>

        <!-- Dernière image avec modal -->
        <div class="col-6 col-md-2 mb-3">
            <a href="#" data-bs-toggle="modal" data-bs-target="#photosModal" class="text-decoration-none position-relative d-block">
                <img src="assets/images/mikheal's/10.webp" class="img-fluid" alt="Voir plus">
                <div class="overlay-text">+37 photos</div>
            </a>
        </div>
    </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="photosModal" tabindex="-1" aria-labelledby="photosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photosModalLabel">Autres photos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/10.webp" class="img-fluid rounded" alt="Photo 6"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/11.webp" class="img-fluid rounded" alt="Photo 7"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/12.jpg" class="img-fluid rounded" alt="Photo 8"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/13.jpg" class="img-fluid rounded" alt="Photo 9"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/14.jpg" class="img-fluid rounded" alt="Photo 10"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/17.webp" class="img-fluid rounded" alt="Photo 11"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/10.webp" class="img-fluid rounded" alt="Photo 6"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/11.webp" class="img-fluid rounded" alt="Photo 7"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/12.jpg" class="img-fluid rounded" alt="Photo 8"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/13.jpg" class="img-fluid rounded" alt="Photo 9"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/14.jpg" class="img-fluid rounded" alt="Photo 10"></div>
                    <div class="col-4 mb-3"><img src="assets/images/Mikheal's/17.webp" class="img-fluid rounded" alt="Photo 11"></div>
                </div>
            </div>
        </div>
    </div>
</div>
