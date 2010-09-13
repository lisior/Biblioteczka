<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Edycja znajomego w bazie danych</h1>
<form action="edytuj_znajomych_do.php" method="post">
<?php
require 'lacz_baza.php';
$numer=$_REQUEST['id'];

lacz_baza();
$zapytanie = "select * from znajomi where znajomyid = ".$numer."";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
echo '
<table border=1>
<tr>
<td>Id.</td><td>Imie</td><td>Ksywa</td><td>Miasto</td>
</tr>
<tr>
<td><input type="text" name="id" size="5" maxlenght="5" value="'.$wiersz[0].'" READONLY></td><td><input type="text" name="imie" size="30" maxlenght="30" value="'.$wiersz[1].'"</td><td><input type="text" name="ksywa" size="30" maxlenght="30" value="'.$wiersz[2].'"</td><td><input type="text" name="miasto" size="30" maxlenght="30" value="'.$wiersz[3].'"</td>
</tr>
</table>';


?>
<input type="submit" value="OK">
