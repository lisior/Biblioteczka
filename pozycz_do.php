<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Dodawanie książki do bazy danych</h1>
<?php
require 'lacz_baza.php';
$ksiazka = $HTTP_POST_VARS['ksiazka'];
$znajomy = $HTTP_POST_VARS['znajomy'];

lacz_baza();
$zapytanie = "select ksiazkaid,pozyczona from ksiazki where tytul = '".$ksiazka."'";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
$ksiazkaid = $wiersz[0];
$pozyczona = $wiersz[1];
//echo $pozyczona;
if ($pozyczona == '0')
{
$zapytanie = "select znajomyid from znajomi where ksywa = '".$znajomy."'";
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);
$znajomyid = $wiersz[0];
$data =  date('jS \of F Y');
$zapytanie = "insert into pozyczone (ksiazkaid, znajomyid, data) values ('".$ksiazkaid."','".$znajomyid."','".$data."')";
$wynik = mysql_query($zapytanie);
if ($wynik)	echo '<p>'. mysql_affected_rows(). ' WIERSZ DODANO</p>';
$zapytanie = "update ksiazki set pozyczona = 1 where ksiazkaid=".$ksiazkaid."";
$wynik = mysql_query($zapytanie);
}
else
{
echo 'Książka jest już wypożyczona !!!';
}
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
<br /><br />
</body>
</html>