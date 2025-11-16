<?php
session_start();

$username = $_SESSION["utente"];
echo "ciao $username";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cameriere</title>
</head>
<body>
  <form action="cameriere.php" method="post">

  <label>
Tavolo <input type="number" name="tavolo" min="1" max="20" required><br>
Nome piatto <select name="piatto" required>
  <option value="spaghetti" >Spaghetti</option>
  <option value="zuppa" >Zuppa</option>
  <option value="carne" >Carne</option>
  <option value="spinaci" >Spinaci</option>
</select><br>
Quantita <input type="number" name="quantita" min="1" required><br>
note <input type="text" name="note"><br>
</label>
   <button type="submit">Invia</button> 
  </form>
    <a href="memo.php">Vai al resoconto</a>
</body>
</html>

<?php 
//spaghetti = 5 zuppa = 4 carne = 3 spinaci = 2

$prezzi = [

  "spaghetti" => 5,
  "zuppa" => 4,
  "carne" => 3,
  "spinaci" => 2,

];

$ordine = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
$tavolo = $_POST["tavolo"];
$piatto = $_POST["piatto"];
$quantita = $_POST["quantita"];
$note = $_POST["note"];

$_SESSION["prezzi"] = $prezzi;

$ordine = [
"tavolo" => $tavolo,
"piatto" => $piatto,
"quantita" => $quantita,
"note" => $note
];
$_SESSION["ordini"][] = $ordine;
}
?>