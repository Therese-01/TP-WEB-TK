<?php
require_once __DIR__.'../bdconfig/sessionInclude.php';
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../../php/connexion.php");
?>