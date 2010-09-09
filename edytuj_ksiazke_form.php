 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<html>
<h1> Edytuj książkę </h1>
<form action="edytuj_ksiazke_form2.php" method="post">
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
echo '<br /> Wybierz pozycję do edycji ';


?>

<input type="submit" value="Edytuj">
</form>
</html>
