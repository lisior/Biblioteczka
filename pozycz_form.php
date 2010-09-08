 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<html>
<h1> Pożycz książkę </h1>
<form action="pozycz_do.php" method="post">
Wybierz książkę, którą chcesz pożyczyć   
<?
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from ksiazki";
$wynik = mysql_query($zapytanie);
$ile = mysql_numrows($wynik);
echo'<select name="ksiazka">';
echo'<option value = "ksiazka">Wybierz książkę';
	for ($i=0; $i<$ile; $i++)
{
$wiersz = mysql_fetch_array($wynik);
echo'<option value = "'.$wiersz[2].'">'.$wiersz[2];
}	
echo '</select><br />';
echo '<br /> Wybierz znajomego, któremu pożyczasz książkę: ';

$zapytanie = "select * from znajomi";
$wynik = mysql_query($zapytanie);
$ile = mysql_numrows($wynik);

echo'<select name="znajomy">';
echo'<option value = "znajomy">Wybierz znajomego';
	for ($i=0; $i<$ile; $i++)
{
$wiersz2 = mysql_fetch_array($wynik);
echo'<option value = "'.$wiersz2[2].'">'.$wiersz2[2].'   ';
}	
echo '</select>';
echo'<br /><br /><br />';
?>

<input type="submit" value="Pożycz">
</form>
</html>
