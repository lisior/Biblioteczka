<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<body>
<h1>Dodawanie ksi��ki do bazy danych</h1>
<?php
require 'lacz_baza.php';
$imie = $HTTP_POST_VARS['imie'];
$ksywa = $HTTP_POST_VARS['ksywa'];
$miasto = $HTTP_POST_VARS['miasto'];
lacz_baza();
$zapytanie = "insert into znajomi (imie, ksywa, miasto) values ('".$imie."','".$ksywa."','".$miasto."')";
$wynik = mysql_query($zapytanie);
if ($wynik)	echo '<p>'. mysql_affected_rows(). ' WIERSZ DODANO</p>';
?>

<br /><br />
<p><a href="http://ksiazki.lisior.pl">POWR�T</a></p>
<br /><br />
</body>
</html>