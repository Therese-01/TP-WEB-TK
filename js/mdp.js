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

function validerEmail(email) {
  var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return regexEmail.test(email);
}

function validerNomUtilisateur(nom) {
  var regex = /^[a-zA-Z0-9]{5,12}$/;
  return regex.test(nom);
}

function AfficherBlocMotDePasse() {
  var email = document.getElementById("emailSignup").value.trim();
  var mdp = document.getElementById("passwordSignup").value.trim();
  var erreur = document.getElementById("erreurSignup");
  
  // Vérifie l'email
  if (validerEmail(email)) {
    document.getElementById("passwdSection").style.display = "block"; 
    erreur.style.display = "none";

    // Vérifie le mot de passe seulement si l'email est valide
    if (validerMotdepasse(mdp)) {
      document.getElementById("nomUtilisateurSection").style.display = "block";

      // Vérifie le nom utilisateur et affiche erreur si invalide
      if (nom !== "" && !validerNomUtilisateur(nom)) {
        erreur.style.display = "block";
        erreur.textContent = "Le nom d'utilisateur doit contenir entre 5 et 12 caractères alphanumériques.";
      } else {
        erreur.style.display = "none";
      }
    } else {
      document.getElementById("nomUtilisateurSection").style.display = "none";
    }
  } else {
    document.getElementById("passwdSection").style.display = "none";
    document.getElementById("nomUtilisateurSection").style.display = "none";
    erreur.style.display = "block";
    erreur.textContent = "L'email n'est pas valide.";
  }
}


document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("emailSignup").addEventListener("input", AfficherBlocMotDePasse);
  document.getElementById("passwordSignup").addEventListener("input", AfficherBlocMotDePasse);
  document.getElementById("nomUtilisateurSection").addEventListener("input", AfficherBlocMotDePasse);
});