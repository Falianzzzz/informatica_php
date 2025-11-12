<?php 

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $piatto = $_POST['piatto']; 
    unset($_SESSION["ordini"][$piatto]);

}

if (!empty($_SESSION["ordini"])) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>Tavolo</th>
            <th>Piatto</th>
            <th>Quantità</th>
            <th>Note</th>
            <th>Gestione</th>
            <th>Prezzi</th>
          </tr>";

    $conta = 0;$costoTot = 0;
    foreach ($_SESSION["ordini"] as $ordine) {
      $costo = 0;
      switch ($ordine["piatto"]) {
        case 'spaghetti':
         $costo += 5;
          break;
           case 'zuppa':
          $costo += 4;
          break;
           case 'carne':
          $costo += 3;
          break;
           case 'spinaci':
          $costo += 2;
          break;

      }

      $costo *= $ordine["quantita"];

        echo "<tr>";
        echo "<td>" . $ordine["tavolo"] . "</td>";
        echo "<td>" . htmlspecialchars($ordine["piatto"]) . "</td>";
        echo "<td>" . $ordine["quantita"] . "</td>";
        echo "<td>" . htmlspecialchars($ordine["note"]) . "</td>";
        echo "<td> <form action ='memo.php' method = 'post'><button type = 'sumbit' value = $conta name ='piatto'>Rimuovi</button> </form> </td>";
         echo "<td>$costo</td>";
        echo "</tr>";
        $conta++;
        $costoTot += $costo;
        
    }

    echo "</table>";
    echo "$costoTot";
} else {
    echo "<p>Nessun ordine presente.</p>";
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
<a href="cameriere.php">Torna ad ordinare</a>

</body>
</html>