<html>
<h1> Wyszukaj ksi��k� </h1>
<form action="pozycz_do.php" method="post">
Wybierz ksi��k�, kt�r� chcesz po�yczy�   
<?
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from ksiazki";
$wynik = mysql_query($zapytanie);
$ile = mysql_numrows($wynik);
echo'<select name="ksiazka">';
echo'<option value = "ksiazka">Wybierz ksi��k�';
	for ($i=0; $i<$ile; $i++)
{
$wiersz = mysql_fetch_array($wynik);
echo'<option value = "'.$wiersz[2].'">'.$wiersz[2];
}	
echo '</select><br />';
echo '<br /> Wybierz znajomego, kt�remy po�yczasz ksi��k�: '.$wiersz[2].'   ';

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

<input type="submit" value="Po�ycz>
</form>
</html>