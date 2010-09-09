<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Edycja znajomego w bazie danych</h1>
<?php
require 'lacz_baza.php';
$id = $HTTP_POST_VARS['id'];
$imie = $HTTP_POST_VARS['imie'];
$ksywa = $HTTP_POST_VARS['ksywa'];
$miasto = $HTTP_POST_VARS['miasto'];
//echo $id,$tytul,$autor,$wydawnictwo,$isbn,$pozyczona,$biblionetka;

lacz_baza();
$zapytanie = "update znajomi set imie = '".$imie."' where znajomyid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update znajomi set ksywa = '".$ksywa."' where znajomyid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update znajomi set miasto = '".$miasto."' where znajomyid=".$id;
$wynik = mysql_query($zapytanie);
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
<br /><br />
</body>
</html>
