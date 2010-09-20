<?php
session_start();
session_register("zalogowany");
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">';
if(empty($_SESSION["zalogowany"]))$_SESSION["zalogowany"]=0;
require 'baza.php';
mysql_connect($host, $user, $passwd)or die("Nie można nawiązać połączenia z bazą");
mysql_select_db($baza)or die("Wystąpił błąd podczas wybierania bazy danych");

function ShowLogin($komunikat=""){
	echo "$komunikat<br>";
	echo "<form action='index.php' method=post>";
	echo "Login: <input type=text name=login><br>";
	echo "Hasło: <input type=password name=haslo><br>";
	echo "<input type=submit value='Zaloguj!'>";
	echo "</form>";
	echo "Jeśli nie jesteś zarejestrowany, <a href='rejestruj.php'>tu znajdziesz formularz</a>";
}

?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
	<title>Strona główna</title>
</head>
<body>
<?php
if($_GET["wyloguj"]=="tak"){$_SESSION["zalogowany"]=0;echo "Zostałeś wylogowany z serwisu";}
if($_SESSION["zalogowany"]!=1){
	if(!empty($_POST["login"]) && !empty($_POST["haslo"])){
		if(mysql_num_rows(mysql_query("select * from users where user_login = '".htmlspecialchars($_POST["login"])."' AND user_haslo = (PASSWORD('".($_POST["haslo"])."'))"))){
			echo "Zalogowano poprawnie. <a href='index.php'>Przejdź na stronę główną</a>";
			$iduser = mysql_fetch_array(mysql_query("select user_id from users where user_login = '".htmlspecialchars($_POST["login"])."'"));
			$_SESSION["iduser"] = $iduser[0];
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">';
			$_SESSION["zalogowany"]=1;
			}
		else echo ShowLogin("Podano złe dane!!!");
		}
	else ShowLogin();
}
else{
?>
Gratulacje! Zalogowałeś się pomyślnie! <br> <a href='index.php?wyloguj=tak'>wyloguj się</a>
<?php
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Biblioteczka</title>
</head>

<body bgcolor = "white">
<h1 align = "center"> Biblioteczka v.1.0.0</h1>
<br>
<br>

<table border=1 align = "center">
<tr align = "center">
<th>KSIĄŻKI</th><th>ZNAJOMI</th><th>POŻYCZ</th>
</tr>
<tr>
<td><a href="dodaj_ksiazke.php">Dodaj książkę</a></td><td><a href="dodaj_znajomego.php">Dodaj znajomego</a></td><td><a href="pozycz_form.php">Pożycz książkę</a></td>
<tr>
<td><a href="wyswietl_ksiazki.php">Wyświetl książki</a></td><td><a href="wyswietl_znajomych.php">Wyświetl znajomych</a></td><td><a href="wyswietl_pozyczone.php">Wyświetl listę pożyczonych</td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;</td><td><a href="zwroc_ksiazke_form.php"> Zwrot książki </a></td>
</tr>

</table>
</body>
</html>
</body>
</html>
<?php mysql_close(); ?>