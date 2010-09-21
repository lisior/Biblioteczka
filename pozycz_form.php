<?php
require 'check.php';
?>
<html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<head>
    <title>Biblioteczka</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
<h1> Pożycz książkę </h1>
<form action="pozycz_do.php" method="post">
Wybierz książkę, którą chcesz pożyczyć   
<?
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from ksiazki where pozyczona = 0";
$wynik = mysql_query($zapytanie);
$ile = mysql_numrows($wynik);
echo'<select name="ksiazka">';
echo'<option value = "ksiazka">Wybierz książkę';
	for ($i=0; $i<$ile; $i++)
{
$wiersz = mysql_fetch_array($wynik);
echo'<option value = "'.$wiersz[2].'">'.$wiersz[2];
}	
echo '</select><br />';
echo '<br /> Wybierz znajomego, któremu pożyczasz książkę: ';

$zapytanie = "select * from znajomi";
$wynik = mysql_query($zapytanie);
$ile = mysql_numrows($wynik);

echo'<select name="znajomy">';
echo'<option value = "znajomy">Wybierz znajomego';
	for ($i=0; $i<$ile; $i++)
{
$wiersz2 = mysql_fetch_array($wynik);
echo'<option value = "'.$wiersz2[2].'">'.$wiersz2[2].'   ';
}	
echo '</select>';
echo'<br /><br /><br />';
?>

<input type="submit" value="Pożycz">
<br>
<br>
<p><a href="index.php">POWRÓT</a></p>
</form>
</html>
