<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <title>Lista książek</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
<body>
<br>
<br>
<h1>Lista książek</h1>

<?php
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from ksiazki";
$wynik = mysql_query($zapytanie);
$ileznalezionych = mysql_numrows($wynik);
echo '
<table border=1>
<tr>
<td>Lp.</td><td>Tytuł</td><td>Autor</td><td>Wydawnictwo</td><td>ISBN</td><td>POZYCZONA</td><td>BIBLIONETKA</td>
</tr>';
for ($i=0; $i<$ileznalezionych; $i++)
{
$wiersz = mysql_fetch_array($wynik);
if ($wiersz[5] == '1')
{
$pozyczona = 'TAK';
}
else
{
$pozyczona = 'NIE';
}
if ($wiersz[6] == '0')
{
$link = 'Brak odnośnika do BIBLIONETKI';
}
else
{
$adres = 'http://www.biblionetka.pl/book.aspx?id='.$wiersz[6];
$link = '<a href="'.$adres.'" target="_blank">www.biblionetka.pl</a>';
}
echo'
<tr>
<td>'.$wiersz[0].'</td><td>'.$wiersz[1].'</td><td>'.$wiersz[2].'</td><td>'.$wiersz[3].'</td><td>'.$wiersz[4].'</td><td>'.$pozyczona.'</td><td>'.$link.'</td><td><a href="edytuj.php?id='.$wiersz[0].'"><input type="submit" value="Edytuj"></a></td></tr>
</tr>';
 }
echo '</table>';
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
</body>
</html>