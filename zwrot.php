<?
require 'check.php';
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <title>Zwrot książki</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
<body>
<h1>Dodawanie książki do bazy danych</h1>
<?php
require 'lacz_baza.php';
$numer=$_REQUEST['id'];
lacz_baza();
$zapytanie = "select ksiazkaid from ksiazki where ksiazkaid = '".$numer."'";
$zapytanie = "delete from pozyczone where ksiazkaid = '".$numer."'";
$wynik = mysql_query($zapytanie);
if ($wynik)	echo '<p>'. mysql_affected_rows(). ' WIERSZ DODANO</p>';
$zapytanie = "update ksiazki set pozyczona = 0 where ksiazkaid=".$numer;
$wynik = mysql_query($zapytanie);
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
<br /><br />
</body>
</html>