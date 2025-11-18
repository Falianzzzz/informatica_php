<?php 

session_start();
   

echo "<table border='1'>
<th>NOME</th>
<th>ETA</th>
<th>PAGAMENTO</th>
<th>PREZZO</th>";

$conta = 0;
foreach($_SESSION["iscritti"] as $iscritto) {

echo "<tr>
<td> ". $iscritto["nome"]. "</td>
<td> ". $iscritto["eta"]. "</td>
<td> ". $iscritto["frequenza"]. "</td>
<td> ". $iscritto["prezzo"]. "</td>
</tr>";
$conta += $iscritto["prezzo"];
}
echo "</table><br>La palestra ha guadagnato in totale: $conta";
?>

