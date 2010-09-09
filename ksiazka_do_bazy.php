<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Dodawanie książki do bazy danych</h1>
<?php
require 'lacz_baza.php';
$tytul = $HTTP_POST_VARS['tytul'];
$autor = $HTTP_POST_VARS['autor'];
$wydawnictwo = $HTTP_POST_VARS['wydawnictwo'];
$isbn = $HTTP_POST_VARS['isbn'];
$biblionetka = $HTTP_POST_VARS['biblionetka'];
$autor = addslashes($autor);
$tytul = addslashes($tytul);
$wydawnictwo = addslashes($wydawnictwo);
$isbn = addslashes($isbn);
lacz_baza();
$zapytanie = "insert into ksiazki (autor, tytul, wydawnictwo, isbn,biblionetka) values ('".$autor."','".$tytul."','".$wydawnictwo."','".$isbn."','".$biblionetka."')";
$wynik = mysql_query($zapytanie);
if ($wynik)	echo '<p>'. mysql_affected_rows(). ' WIERSZ DODANO</p>';
?>

<br /><br />
<p><a href="index.php">POWRÓT</a></p>
<br /><br />
</body>
</html>