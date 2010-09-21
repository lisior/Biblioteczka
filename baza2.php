<script type="text/javascript">
function show_alert($alert)
{
alert($alert);
}
</script>
<form action="edytuj_ksiazke_do.php" method="post">
<?php
require 'baza.php';
$part=$_GET["part"];

$db = mysql_connect($host, $user, $passwd);
if (!$db)
 {
 die('błąd połączenia: ' . mysql_error());
 }

mysql_select_db($baza, $db);
if ($part!='')
{
$sql="SELECT * FROM ksiazki WHERE autor = '".$part."'";
$result = mysql_query($sql);
}
else
{
$sql="SELECT * FROM ksiazki";
$result = mysql_query($sql);
}
 //echo "<input type="submit" value="Dodaj"";
echo "<table border=1>
<tr>
<td>Autor</td>
<td>Tytuł</td>
<td>Wydawnictwo</td>
<td>ISBN</td>
<td>Pożyczona</td>
<td>Link</td>
</tr>";

while($row = mysql_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['autor'] . "</td>";
 echo "<td>" . $row['tytul'] . "</td>";
 echo "<td>" . $row['wydawnictwo'] . "</td>";
 echo "<td>" . $row['isbn'] . "</td>";
 if ($row['pozyczona'] == 1)
 {
 echo "<td>TAK</td>";
 }
 else
 {
 echo "<td>NIE</td>";
 }
$adres = 'http://www.biblionetka.pl/book.aspx?id='.$row['biblionetka'];
$link = '<a href="'.$adres.'" target="_blank">LINK</a>';
echo '<td>'.$link.'</td>';
 echo '<td><a href="edytuj.php?id='.$row['ksiazkaid'].'"><input type="submit" value="Edytuj"></a></td></td>';
 echo "</tr>";
 }
echo "</table>";

mysql_close($db);
?>