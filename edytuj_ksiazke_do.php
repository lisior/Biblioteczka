<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Edycja książki w bazie danych</h1>
<?php
require 'lacz_baza.php';
$id = $HTTP_POST_VARS['id'];
$tytul = $HTTP_POST_VARS['tytul'];
$autor = $HTTP_POST_VARS['autor'];
$wydawnictwo = $HTTP_POST_VARS['wydawnictwo'];
$isbn = $HTTP_POST_VARS['isbn'];
$pozyczona = $HTTP_POST_VARS['pozyczona'];
$biblionetka = $HTTP_POST_VARS['biblionetka'];

//echo $id,$tytul,$autor,$wydawnictwo,$isbn,$pozyczona,$biblionetka;
lacz_baza();
$zapytanie = "update ksiazki set autor = '".$autor."' where ksiazkaid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update ksiazki set tytul = '".$tytul."' where ksiazkaid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update ksiazki set wydawnictwo = '".$wydawnictwo."' where ksiazkaid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update ksiazki set isbn = '".$isbn."' where ksiazkaid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update ksiazki set pozyczona = '".$pozyczona."' where ksiazkaid=".$id;
$wynik = mysql_query($zapytanie);
$zapytanie = "update ksiazki set biblionetka = '".$biblionetka."' where ksiazkaid=".$id;
$wynik = mysql_query($zapytanie);
?>

<br /><br />
<p><a href="index.php">POWRÓT</a></p>
<br /><br />
</body>
</html>