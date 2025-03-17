<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/login.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body> 
    <main>
        <div class="container">
            <div class="login-section">
            <h2>Connexion</h2>
            <form id="loginForm">
                <div class="email">
                    <label for="emailLogin">Courriel*</label>
                    <input type="email" id="emailLogin" placeholder="Entrez votre courriel" required>
                </div>

                <div class="passwd">
                    <label for="passwordLogin">Mot de passe*</label>
                    <input type="password" id="passwordLogin" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="mdp">
                    <a href="#" >Mot de passe oublié ?</a>
                </div>
                
                <div class="connect">
                    <button type="submit">CONNEXION</button>
                </div>
                <p class="para">Les champs marqués d'un * sont obligatoires</p>
                
            </form>
            </div>
            <div class="signup-section">
                <div>
                    <h2>Créer un compte</h2>
                    <form id="signupForm">
                        <div class="email">
                            <label for="emailSignup">Courriel</label>
                            <input type="email" id="emailSignup" placeholder="Entrez votre courriel" required>
                        </div>

                        <div class="connect">
                            <button type="submit">CRÉER MON COMPTE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    
    
    <script src="./js/Pageconnexion.js"></script>
    
</body>
</html>
