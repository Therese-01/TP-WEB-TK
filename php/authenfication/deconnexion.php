<?php

require_once '/home/tokoh25techinfo4/bdconfig/sessionInclude.php';

session_start();

$_SESSION = array();
session_destroy();
header("Location: ../../php/index.php");
?>