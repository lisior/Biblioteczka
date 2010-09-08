<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<body>
<h1>Dodawanie książki do bazy danych</h1>
<?php
require 'lacz_baza.php';
$ksiazka = $HTTP_POST_VARS['ksiazka'];
$znajomy = $HTTP_POST_VARS['znajomy'];

lacz_baza();
$zapytanie = "select ksiazkaid from ksiazki where tytul = '".$ksiazka."'";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
$ksiazkaid = $wiersz[0];
$zapytanie = "select znajomyid from znajomi where ksywa = '".$znajomy."'";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
$znajomyid = $wiersz[0];
$data =  date('jS \of F Y');
$zapytanie = "insert into pozyczone (ksiazkaid, znajomyid, data) values ('".$ksiazkaid."','".$znajomyid."','".$data."')";
$wynik = mysql_query($zapytanie);
if ($wynik)	echo '<p>'. mysql_affected_rows(). ' WIERSZ DODANO</p>';

?>
<br /><br />
<p><a href="http://ksiazki.lisior.pl">POWRÓT</a></p>
<br /><br />
</body>
</html>