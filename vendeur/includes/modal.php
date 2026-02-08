<div class="modal fade" id="venteCoca" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Vente – Coca-Cola</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="vente.php" method="POST">

                <div class="modal-body">

                    <!-- ID PRODUIT -->
                    <input type="hidden" name="produit_id" value="1">

                    <div class="mb-3">
                        <label class="form-label">Prix unitaire (FCFA)</label>
                        <input type="number" class="form-control" name="prix"
                               value="500" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantité</label>
                        <input type="number" class="form-control" name="quantite"
                               min="1" max="120" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Client (optionnel)</label>
                        <input type="text" class="form-control" name="client"
                               placeholder="Nom du client">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Valider la vente
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
