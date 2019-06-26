<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
setcookie('login', '');
setcookie('pass_hache', '');
header("location:index.html");