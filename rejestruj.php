<?php
require 'baza.php';
mysql_connect($host, $user, $passwd)or die("Nie można nawiązać połączenia z bazą"); //połączenie z bazą danych
mysql_select_db($baza)or die("Wystąpił błąd podczas wybierania bazy danych");

function ShowForm($komunikat=""){	//funkcja wyświetlająca formularz rejestracyjny
	echo "$komunikat<br>";
	echo "<form action='rejestruj.php' method=post>";
	echo "Login: <input type=text name=login><br>";
	echo "Hasło: <input type=password name=haslo><br>";
	echo "Hasło: <input type=password name=haslo2><br>";
	echo "<input type=hidden value='1' name=send>";
	echo "<input type=submit value='Zarejestruj mnie'>";
	echo "</form>";
}
?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
	<title>Formularz rejestracyjny</title>
</head>
<body>
<?php

if ($_POST["haslo"]==$_POST["haslo2"])
{
if($_POST["send"]==1){	//sprawdzanie czy formularz został wysłany
	if(!empty($_POST["login"]) && !empty($_POST["haslo"])){	//oraz czy uzupełniono wszystkie dane
		if(mysql_num_rows(mysql_query("select * from users where user_login='".htmlspecialchars($_POST["login"]."'"))))ShowForm("Użytkownik o podanym loginie już istnieje!!!"); // sprawdzanie czy użytkownik o podanej nazwie już istnieje
		else{
			mysql_query("insert into users values(NULL, '".htmlspecialchars($_POST["login"])."', (PASSWORD('".$_POST['haslo']."')))"); // zapisywanie rekordu do bazy
			echo "Rejestracja przebiegła pomyślnie. Możesz teraz przejść do <a href='index.php'>strony głównej</a> i się zalogować.";
			}
	}
	else ShowForm("Nie uzupełniono wszystkich pól!!!");
}
else ShowForm();
}
else
{
echo "hasła niezgodne";

ShowForm();
}
mysql_close(); //zamykanie połączenia z bazą
?>
</body>
</html>