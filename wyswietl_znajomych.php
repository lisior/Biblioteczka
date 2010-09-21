<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <title>Lista znajomych</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
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
<th>Lp.</th><th>Imie</th><th>Ksywa</th><th>Miasto</th>
</tr>';
for ($i=0; $i<$ileznalezionych; $i++)
{
$wiersz = mysql_fetch_array($wynik);
echo'
<tr>
<td>'.$wiersz[0].'</td><td>'.$wiersz[1].'</td><td>'.$wiersz[2].'</td><td>'.$wiersz[3].'</td><td><a href="edytuj_znajomych_form.php?id='.$wiersz[0].'"><input type="submit" value="Edytuj"></a></td>
</tr>'  ;
 }
echo '</table>';
?>
<br /><br />
<p><a href="index.php">POWRÓT</a></p>
</body>
</html>
