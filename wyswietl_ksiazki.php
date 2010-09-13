<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<h1>Lista książek</h1>

<?php
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from ksiazki";
$wynik = mysql_query($zapytanie);
$ileznalezionych = mysql_numrows($wynik);
echo '
<table border=1>
<tr>
<th>Lp.</th><th>Tytuł</th><th>Autor</th><th>Wydawnictwo</th><th>ISBN</th><th>POŻYCZONA</th><th>BIBLIONETKA</th><th>DODAŁ</th>
</tr>';
for ($i=0; $i<$ileznalezionych; $i++)
{
$wiersz = mysql_fetch_array($wynik);
if ($wiersz[5] == '1')
{
$pozyczona = 'TAK';
}
else
{
$pozyczona = 'NIE';
}
if ($wiersz[6] == '0')
{
$link = 'Brak odnośnika do BIBLIONETKI';
}
else
{
$adres = 'http://www.biblionetka.pl/book.aspx?id='.$wiersz[6];
$link = '<a href="'.$adres.'" target="_blank">www.biblionetka.pl</a>';
}
$user = mysql_fetch_array(mysql_query("select user_login from users where user_id = '".$wiersz[7]."'"));
echo'
<tr>
<td>'.$wiersz[0].'</td><td>'.$wiersz[1].'</td><td>'.$wiersz[2].'</td><td>'.$wiersz[3].'</td><td>'.$wiersz[4].'</td><td>'.$pozyczona.'</td><td>'.$link.'</td><td>'.$user[0].'</td><td><a href="edytuj_ksiazke_form.php?id='.$wiersz[0].'"><input type="submit" value="Edytuj"></a></td></tr>
</tr>';
 }
echo '</table>';
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
</body>
</html>
