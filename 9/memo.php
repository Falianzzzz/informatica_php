<?php 

session_start();

$contoTavoli = [

  "1"=> 0,
  "2"=> 0,
  "3"=> 0,
  "4"=> 0,
  "5"=> 0,
  "6" =>0,
  "7" =>0,
  "8" =>0,
  "9" =>0,
  "10" =>0,
  "11" =>0,
  "12" =>0,
  "13" =>0,
  "14" =>0,
  "15" =>0,
  "16" =>0,
  "17" =>0,
  "18" =>0,
  "19" =>0,
  "20" =>0,

];
/*
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $piatto = $_POST['piatto']; 
   $val =  $_SESSION["ordini"]["costo"];
   $tavolo = $_SESSION["ordini"]["tavolo"];
    unset($_SESSION["ordini"][$piatto]);
    $contoTavoli[$tavolo] -= $val;

}
*/
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $index = $_POST['piatto'];
    
    if(isset($_SESSION["ordini"][$index])) {
        $ordine = $_SESSION["ordini"][$index];

        $costo = 0;
        switch ($ordine["piatto"]) {
            case 'spaghetti': $costo = 5; break;
            case 'zuppa': $costo = 4; break;
            case 'carne': $costo = 3; break;
            case 'spinaci': $costo = 2; break;
        }
        $costo *= $ordine["quantita"];

        $tavolo = $ordine["tavolo"];

        unset($_SESSION["ordini"][$index]);

        $contoTavoli[$tavolo] -= $costo;
    }

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

    $conta = 0;
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

            for( $i = 1; $i <= 20; $i++ ) {

        if( $ordine['tavolo'] == $i) {
          $contoTavoli[$i] += $costo;
          break;
        }
      }

        echo "<tr>";
        echo "<td>" . $ordine["tavolo"] . "</td>";
        echo "<td>" . htmlspecialchars($ordine["piatto"]) . "</td>";
        echo "<td>" . $ordine["quantita"] . "</td>";
        echo "<td>" . htmlspecialchars($ordine["note"]) . "</td>";
        echo "<td> <form action ='memo.php' method = 'post'><button type = 'sumbit' value = $conta name ='piatto'>Rimuovi</button> </form> </td>";
         echo "<td>$costo €</td>";
        echo "</tr>";
        $conta++;

        
    }

    echo "</table>";

    for ($i=1; $i <= 20; $i++) { 
     if( $contoTavoli[$i] > 0) echo "il conto totale del tavolo $i equivale a ". $contoTavoli[$i] ."€\n";
    }
   
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