<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/mdp.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body> 
    <main>
        <div class="container">
            <div class="login-section">
            <h2>Connexion</h2>
            <form id="loginForm" action="/TK_PROJET_WEB_APPLICATION/php/authenfication/connexionrecue.php" method="POST">
                <div class="email">
                    <label for="emailLogin">Courriel*</label>
                    <input type="email" id="emailLogin" name="courriel" placeholder="Entrez votre courriel" required>
                </div>

                <div id="erreurLogin" style="display:none; color:red;"></div>

                <div class="passwd">
                    <label for="passwordLogin">Mot de passe*</label>
                    <input type="password" id="passwordLogin" name="motdepasse" placeholder="Entrez votre mot de passe" required>
                    <input type="checkbox" id="showLogin" onclick="AfficherMotdePasse('passwordLogin', 'showLogin')">Afficher le mot de passe
                </div>

                <div class="mdp">
                    <a href="#" >Mot de passe oublié ?</a>
                </div>
                <div class="connect">
                    <button type="submit" name="connexion">CONNEXION</button>
                </div>
                <p class="para">Les champs marqués d'un * sont obligatoires</p>
                
            </form>
            </div>
            <div class="signup-section">
                <div>
                    <h2>Créer un compte</h2>
                    <form id="signupForm" action="./authenfication/traitementconnexion.php" method="POST">
                        <div class="email">
                            <label for="emailSignup">Courriel</label>
                            <input type="email" id="emailSignup" name="courriel" placeholder="Entrez votre courriel" required>
                        </div>

                        <div id="erreurSignup" style="display:none; color:red;"></div>

                        <div class="passwd" id="passwdSection" style="display:none;">
                            <label for="passwordLogin">Mot de passe</label>
                            <input type="password" id="passwordSignup" name="motdepasse" onchange="AfficherBlocMotDePasse()" placeholder="Entrez votre mot de passe" required>
                            <input type="checkbox" id="showSignup" onclick="AfficherMotdePasse('passwordSignup', 'showSignup')">Afficher le mot de passe
                        </div>

                        <div class="nomUtilisateur" id="nomUtilisateurSection" style="display:none;">
                            <label for="nomUtilisateur">Nom d'utilisateur</label>
                            <input type="text" id="nomUtilisateurSignup" name="nomutilisateurs" placeholder="Entrez votre nom d'utilisateur" required>
                        </div>

                        <div class="connect">
                            <button type="submit" name="inscription" id="submitbtn">CRÉER MON COMPTE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
