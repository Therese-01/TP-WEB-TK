<?php
require_once __DIR__.'/../bdconfig/sessionInclude.php';
session_start();
$_SESSION['code'] = $code;
$destinataire = $_SESSION['courriel'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php 
if (envoyerMail($destinataire, "Votre code est : ".$code)) {
    header("Location: ../php/authentification/coderecu.php");
    exit();
} else {
    echo "<p>Message non envoyé à ". $destinataire."</p>";
}

function envoyerMail($to, $message) {
     $subject = 'Code de vérification';
     $headers = 
     'From: tokoh25techinfo4@techinfo420.ca' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     return mail($to, $subject, $message, $headers);    
}

?>
    </body>
</html>