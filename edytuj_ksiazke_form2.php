<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Edycja książki w bazie danych</h1>
<form action="edytuj_ksiazke_do.php" method="post">
<?php
require 'lacz_baza.php';
$ksiazka = $HTTP_POST_VARS['ksiazka'];
$znajomy = $HTTP_POST_VARS['znajomy'];

lacz_baza();
$zapytanie = "select * from ksiazki where tytul = '".$ksiazka."'";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
echo '
<table border=1>
<tr>
<td>Lp.</td><td>Autor</td><td>Tytuł</td><td>Wydawnictwo</td><td>ISBN</td><td>POZYCZONA</td><td>BIBLIONETKA</td>
</tr>
<tr>
<td><input type="text" name="id" size="5" maxlenght="5" value="'.$wiersz[0].'" READONLY></td><td><input type="text" name="autor" size="30" maxlenght="30" value="'.$wiersz[1].'"</td><td><input type="text" name="tytul" size="30" maxlenght="30" value="'.$wiersz[2].'"</td><td><input type="text" name="wydawnictwo" size="25" maxlenght="25" value="'.$wiersz[3].'"</td><td><input type="text" name="isbn" size="15" maxlenght="15" value="'.$wiersz[4].'"</td><td><input type="text" name="pozyczona" size="5" maxlenght="5" value="'.$wiersz[5].'"</td><td><input type="text" name="biblionetka" size="5" maxlenght="5" value="'.$wiersz[6].'"</tr>
</tr>
</table>';


?>
<input type="submit" value="OK">
