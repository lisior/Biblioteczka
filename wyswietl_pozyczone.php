<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<body>
<h1>Lista po�yczonych ksi��ek</h1>
<?php
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from pozyczone";
$wynik = mysql_query($zapytanie);
$ileznalezionych = mysql_numrows($wynik);
echo'
<table border=1>
<tr>
<td>ID</td><td>Tytu� po�yczanej ksi��ki</td><td>Autor po�yczonej ksi��ki</td><td>Imie po�yczaj�cego</td><td>Ksywa po�yczaj�cego</td><td> Data po�yczenia </td>
</tr>';
$idw=0;
for ($i=0; $i<$ileznalezionych; $i++)
{
$wiersz = mysql_fetch_array($wynik);
$id = $wiersz[0];
$ksiazkaid = $wiersz[1];
$znajomyid = $wiersz[2];
$data = $wiersz[3];

$zapytanie2 = "select * from ksiazki where ksiazkaid = '".$ksiazkaid."'";
$wynik2 = mysql_query($zapytanie2);
$ile2 = mysql_numrows($wynik2);
for ($c=0; $c<$ile2; $c++)
{
$wiersz2 = mysql_fetch_array($wynik2);
$tytu� = $wiersz2[1];
$autor = $wiersz2[2];
$wydawnictwo = $wiersz2[3];
$isdn = $wiersz2[4];
}
$zapytanie3 = "select * from znajomi where znajomyid = '".$znajomyid."'";
$wynik3 = mysql_query($zapytanie3);
$ile3 = mysql_numrows($wynik3);
for ($d=0; $d<$ile3; $d++)
{
$wiersz3 = mysql_fetch_array($wynik3);
$imie = $wiersz3[1];
$ksywa = $wiersz3[2];
//$wydawnictwo = $wiersz2[3];
//$isdn = $wiersz2[4];
}
$idw = $idw + 1;
echo  '
<tr>
<td>'.$idw.'</td><td>'.$tytu�.'</td><td>'.$autor.'</td><td>'.$imie.'</td><td>'.$ksywa.'</td><td>'.$data.'</td>
</tr>';

}
echo '</table>';
?>
<br /><br />
<p><a href="http://ksiazki.lisior.pl">POWR�T</a></p>
</body>
</html>