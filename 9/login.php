
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
   Password <input type="password" name ="password"required><br>
</label>
   <button type="submit">Invia</button> 
</form>
  


</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
$utenti = [
    "marco"   => "1234",
    "lucia"   => "abcd",
    "paolo"   => "pass",
    "admin"   => "admin123"
];


    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);


    if ($utenti[$user] === $pass) {

        $_SESSION["utente"] = $user;

        if (!isset($_SESSION["ordini"])) {
            $_SESSION["ordini"] = [];
        }

        header("Location: cameriere.php");
        exit;

    } else echo "<p style='color:red;'>Username o password errati.</p>";
}
?>