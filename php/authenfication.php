<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
require_once 'env.php';
$destinataire = "2204351@cegepat.qc.ca";
$code = rand(100000,999999);

session_start();
$_SESSION['code'] = $code;

if (envoyerMail($destinataire, "Votre code est : ".$code)) {
    echo "<p>Message envoyé à ". $destinataire."</p>";
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