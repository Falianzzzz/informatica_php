<?php 
session_start();

if(!isset($_SESSION["iscritti"]))$_SESSION["iscritti"] = [];
?>


<?php  
if($_SERVER["REQUEST_METHOD" ] == "POST"){
$nome = $_POST["nome"];
$eta = $_POST["eta"];
$frequenza = $_POST["frequenza"];
$prezzo = 0;

if ($eta > 64 || $eta < 18) {
   switch ($frequenza) {
        case 'mensile': $prezzo = 35;break;
        case 'bimestrale': $prezzo = 63; break;
        case 'trimestrale':  $prezzo = 89.25;break;
        case 'annuale': $prezzo = 336;break;
   }
}else{

   switch ($frequenza) {
        case 'mensile': $prezzo = 45;break;
        case 'bimestrale': $prezzo = 81; break;
        case 'trimestrale':  $prezzo = 114.75;break;
        case 'annuale': $prezzo = 432;break;
   }
}


 $iscritto = [
    "nome"=> $nome,
     "eta"=> $eta,
     "frequenza"=> $frequenza,
     "prezzo"=> $prezzo

];

$_SESSION["iscritti"][] = $iscritto; 
echo "<table border='1'>
<th>Nome</th>
<th>Eta</th>
<th>Pagamento</th>
<th>Output</th>
<tr>
<td>$nome</td>
<td>$eta</td>
<td>$frequenza</td>
<td>il prezzo per un anno è di: $prezzo</td>
</tr>
</table>";

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
    <a href="risultati.php">VEDI RESOCONTO</a>
</body>
</html>