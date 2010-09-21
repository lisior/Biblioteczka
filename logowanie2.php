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
	echo "Jeżeli nie jesteś zarejestrowany, <a href='rejestruj.php'>tu znajdziesz formularz</a>";
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