<?php

    require_once __DIR__."/sessionSet.include.php";
    session_start();

    if (!isset($_SESSION['mail']) && !isset($_SESSION['ip']) && $_SESSION['ip'] == $_SERVER['REMOTE_ADDR'])
    {
        error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormal - mail ou mdp absent ou origine différent: Client ".$_SERVER['REMOTE_ADDR']."\n\r",3, __DIR__."/../../../logs/authen.acces.log");
        header("Location: erreur.php");
        exit();
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contenu personnel et confidentiel</h1>
    <h2>Mon courriel : 
    <?php echo $_SESSION['mail']; ?>
    </h2>
</body>
</html>


        
   