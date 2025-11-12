

<?php 


session_start();

!isset($_SESSION["contatore"]) ? $_SESSION["contatore"] = 1 : $_SESSION["contatore"]++;

echo "hai visitato questa pagina ". $_SESSION["contatore"] . " volte durante questa sessione";

if (isset($_POST['azzera'])) {

    session_unset();
    header("Location: visite.php");
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
  <br>  
    <form method="post">
            <button type="submit" name="azzera">Azzera contatore</button>
        </form>

</body>
</html>