
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>

<form method="POST" action="login.php">
<label>
  Username <input type="text" name ="username"required><br>
   Password <input type="text" name ="password"required><br>
</label>
   <button type="submit">Invia</button> 
</form>
  


</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
if ($_POST["username"] == "marco" && $_POST["password"] == "1234"){
  $_SESSION["utente"] = $_POST["username"];
header("Location: cameriere.php");
exit;
}else {
  echo "password o username sbagliato";
}
}
  

?>