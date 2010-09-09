<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Dodawanie książki do bazy danych</h1>
<?php
require 'lacz_baza.php';
$ksiazka = $HTTP_POST_VARS['ksiazka'];
lacz_baza();
$zapytanie = "select ksiazkaid from ksiazki where tytul = '".$ksiazka."'";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
$ksiazkaid = $wiersz[0];
$zapytanie = "delete from pozyczone where ksiazkaid = '".$ksiazkaid."'";
$wynik = mysql_query($zapytanie);
if ($wynik)	echo '<p>'. mysql_affected_rows(). ' WIERSZ DODANO</p>';
$zapytanie = "update ksiazki set pozyczona = 0 where ksiazkaid=".$ksiazkaid;
$wynik = mysql_query($zapytanie);
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
<br /><br />
</body>
</html>