<?php 

session_start();

function sanitize_input($data){

$data = trim($data, " ./");
$data = htmlspecialchars($data);

}

$username = $_POST["username"];
$password = $_POST["password"];

sanitize_input($username);
sanitize_input($password);


if (preg_match("/^[a-zA-Z\s]{1,50}$/", $username) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/", $password)) 
  $_SESSION["utente"] = $username;

header("Location: home.php");

?>
