<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<body>
<h1>Lista znajomych</h1>
<?php
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from znajomi";
$wynik = mysql_query($zapytanie);
$ileznalezionych = mysql_numrows($wynik);
echo '
<table border=1>
<tr align=centrer>
<td>Lp.</td><td>Imie</td><td>Ksywa</td><td>Miasto</td>
</tr>';
for ($i=0; $i<$ileznalezionych; $i++)
{
$wiersz = mysql_fetch_array($wynik);
echo'
<tr>
<td>'.$wiersz[0].'</td><td>'.$wiersz[1].'</td><td>'.$wiersz[2].'</td><td>'.$wiersz[3].'</td>
</tr>'  ;
 }
echo '</table>';
?>
<br /><br />
<p><a href="http://ksiazki.lisior.pl">POWR�T</a></p>
</body>
</html>