<footer class="bg-dark text-white pt-5 pb-4">
  <div class="container text-md-left">
    <!-- ====== Ligne du logo ====== -->
    <div class="row mb-3">
      <div class="col-md-12 text-start">
        <img src="assets/images/logo.png" alt="Logo CongoTour" style="max-width: 120px; height: auto;">
      </div>
    </div>

    <!-- ====== Contenu principal du footer ====== -->
    <div class="row">
      <div class="col-md-3">
        <p>Votre plateforme de confiance pour réserver les meilleurs hôtels à prix doux.</p>
      </div>

      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Découvrir</h5>
        <ul class="list-unstyled">
          <li><a href="destination.php" class="footer-link">Destinations</a></li>
          <li><a href="#" class="footer-link">Hôtels populaires</a></li>
          <li><a href="#" class="footer-link">Offres du moment</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Support</h5>
        <ul class="list-unstyled">
          <li><a href="faq.php" class="footer-link">FAQ</a></li>
          <li><a href="conditions.php" class="footer-link">Conditions d'annulation</a></li>
          <li><a href="contact.php" class="footer-link">Contact</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Newsletter</h5>
        <form>
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Votre email">
            <button class="btn btn-primary btn-hover">S'inscrire</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="text-center mt-4 border-top border-secondary pt-3">
    <p class="mb-0">&copy; 2025 CongoBooking. Tous droits réservés.</p>
  </div>
</footer>

<style>
  /* Animation fluide sur tous les liens du footer */
  .footer-link {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease, padding-left 0.3s ease;
    display: inline-block;
  }

  .footer-link:hover {
    color: #0d6efd; /* Bleu Bootstrap */
    padding-left: 5px;
  }

  /* Bouton newsletter */
  .btn-hover {
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .btn-hover:hover {
    background-color: #0b5ed7;
    transform: translateY(-2px);
  }

  /* Réseaux sociaux */
  .footer-social {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease, transform 0.3s ease;
  }

  .footer-social:hover {
    color: #0d6efd;
    transform: scale(1.1);
  }

  footer h5 {
    font-weight: 600;
  }

  footer p, footer a {
    font-size: 15px;
  }
</style>
