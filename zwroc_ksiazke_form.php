 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<html>
<h1> Zwróć książkę </h1>
<form action="zwroc_ksiazke_do.php" method="post">
Wybierz książkę, którą chcesz pożyczyć   
<?
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "select * from ksiazki where pozyczona = 1";
$wynik = mysql_query($zapytanie);
$ile = mysql_numrows($wynik);
echo'<select name="ksiazka">';
echo'<option value = "ksiazka">Wybierz książkę';
	for ($i=0; $i<$ile; $i++)
{
$wiersz = mysql_fetch_array($wynik);
echo'<option value = "'.$wiersz[2].'">'.$wiersz[2];
}	

?>

<input type="submit" value="Zwróć">
</form>
</html>
