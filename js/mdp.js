function AfficherMotdePasse(inputId, checkboxId) {
  var input = document.getElementById(inputId);
  var checkbox = document.getElementById(checkboxId);

  if (checkbox.checked) {
    input.type = "text";
  } else {
    input.type = "password";
  }
}

function validerMotdepasse(mdp) {
  var regexMinuscule = /[a-z]/;
  var regexMajuscule = /[A-Z]/;
  var regexChiffre = /[0-9]/;
  return mdp.length >= 8 && regexMinuscule.test(mdp) && regexMajuscule.test(mdp) && regexChiffre.test(mdp);
}

document.getElementById("signupForm").addEventListener("submit", function(e) {
  e.preventDefault();
  var mdp = document.getElementById("passwordSignup").value;
  var erreur = document.getElementById("erreurSignup");

  if (!validerMotdepasse(mdp)) {
    erreur.style.display = "block";
    erreur.textContent = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.";
  } else {
    erreur.style.display = "none";
    // Ici tu peux envoyer le formulaire
    alert("Compte créé !");
    // this.submit();
  }
});

document.getElementById("loginForm").addEventListener("submit", function(supprimer) {
  supprimer.preventDefault();
  var mdp = document.getElementById("passwordLogin").value;
  var erreur = document.getElementById("erreurLogin");

  if (!validerMotdepasse(mdp)) {
    erreur.style.display = "block";
    erreur.textContent = "Mot de passe invalide.";
  } else {
    erreur.style.display = "none";
    // Ici tu peux envoyer le formulaire
    alert("Connexion réussie !");
    // this.submit();
  }
});