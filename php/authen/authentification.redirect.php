<?php

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) 
{

    if (filter_input(INPUT_POST,"mail",FILTER_VALIDATE_EMAIL))
    {
        $courriel = filter_input(INPUT_POST,"mail",FILTER_VALIDATE_EMAIL);
        $mdp = filter_input(INPUT_POST,'mdp',FILTER_DEFAULT);

        //Faire une sélect sur la bd pour trouver le mail
        //Le mail existe pour l'exemple
        //Il faut récupérer le mot de passe associé à ce compte.
        $credentielsRemplacementBd = array(array('joe@joe.ca','1234'));

        if ($courriel === $credentielsRemplacementBd[0][0] && $mdp === $credentielsRemplacementBd[0][1])
        {
            //L'authentification est correcte
            require_once __DIR__."/sessionSet.include.php";
            session_start();

            $_SESSION['mail'] = $courriel;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

            header("Location: moninfoperso.php");
        } else 
        {
            //L'authentification est ratée
            error_log("[".date("d/m/o H:i:s e",time())."] Information incorrecte: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/2avril2025.acces.log");
            header("Location: index.php");
        }
    } else 
    {
        error_log("[".date("d/m/o H:i:s e",time())."] Tentative connexion avec compte inexisant: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/2avril2025.acces.log");
        header("Location: erreur.php");
    }

}
else 
{
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/2avril2025.acces.log");
    header("Location: erreur.php");
}