<?php 

session_start();

!isset($_SESSION["utente"]) ? header("Location: login.html") : header("Location: benvenuto.php") ;

?>