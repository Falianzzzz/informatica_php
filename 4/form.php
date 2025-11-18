

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES4</title>
</head>
<body>

<form action="risultato.php" method="post">

<label>
Nome :<input type="text" name="nome"><br>
</label>
<label>
Età :<input type="number" name="eta" min="0"><br>
</label>
<select name="frequenza">
<option value="mensile">Mensile</option>
<option value="bimestrale">Bimestrale</option>
<option value="trimestrale">Trimestrale</option>
<option value="annuale">Annuale</option>
</select>
<br>
<button type="submit">Invia</button>
</form>


<table border="1">
<th>frequenza di Pagamento</th>
<th>Percentuale di sconto</th>
<tr>
    <td>Mensile</td>
    <td>0</td>
</tr>
<tr>
    <td>Bimestrale</td>
    <td>10</td>
</tr>
<tr>
    <td>Trimestrale</td>
    <td>15</td>
</tr>
<tr>
    <td>Annuale</td>
    <td>20</td>
</tr>
</table>

</body>
</html>
