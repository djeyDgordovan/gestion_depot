// gestion des mots de passe
document
  .getElementById("togglePasswordBtn")
  .addEventListener("click", function () {
    const passwordInput = document.getElementById("mot_de_passe");
    const toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("bi-eye");
      toggleIcon.classList.add("bi-eye-slash");
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("bi-eye-slash");
      toggleIcon.classList.add("bi-eye");
    }
  });

// Vérification mot de passe avant soumission du formulaire
document.querySelector("form").addEventListener("submit", function (e) {
  const passwordInput = document.getElementById("mot_de_passe");
  const passwordError = document.getElementById("passwordError");
  const password = passwordInput.value;

  // Regex pour valider le mot de passe
  const regex =
    /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,}$/;

  if (!regex.test(password)) {
    e.preventDefault(); // bloque l’envoi du formulaire
    passwordError.style.display = "block";
    passwordError.textContent =
      "Le mot de passe est trop faible. Ajoute une majuscule, un chiffre et un caractère spécial.";
    passwordInput.classList.add("is-invalid");
  } else {
    passwordError.style.display = "none";
    passwordInput.classList.remove("is-invalid");
  }
});

// Initialisation du carousel Bootstrap pour les avis
const avisCarousel = document.querySelector("#avisCarousel");
const carousel = new bootstrap.Carousel(avisCarousel, {
  interval: 5000, // 5 secondes
  ride: "carousel",
});
// Pause le carousel au survol
avisCarousel.addEventListener("mouseenter", () => {
  carousel.pause();
});


