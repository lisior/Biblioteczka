<?php
include 'logowanie2.php';
?>
 <html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <head>
    <title>Biblioteczka</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>

	<h1 align = "center">Biblioteczka</h1>
	<table border=0 align = "center" color = ffffff>
	<tr >
	<td><a href="wyswietl_ksiazki2.php"><img src="img/ksiazka.gif" alt="Książki" /></a></td>
	<td><a href="wyswietl_znajomych.php"><img src="img/znajomi.gif" alt="Znajomi" /></a></td>
	<td><a href="pozycz_form.php"><img src="img/wymiana.gif" alt="Pożyczenia" /></a></td>
	<td><a href="wyswietl_pozyczone.php"><img src="img/lista.gif" alt="Zwroty" /></a></td>
	</tr>
	<tr align = "center"> 
	<td>KSIĄŻKI</td><td>ZNAJOMI</td><td>POŻYCZENIA</td><td>LISTA POŻYCZEŃ</td>
	</tr>
	</table>
	<br><br>
	<table border=0 align = "center" color = ffffff>
	<tr>
	<td><img src="img/klucz.gif" alt="Ustawienia" /></td>
	<td><img src="img/klodka.gif" alt="Aministracja" /></td>	
	</tr>
	<tr align = "center"> 
	<td>USTAWIENIA</td><td>ADMINISTRACJA</td>
	</tr>
	</table>
	
	  <form action="index.php" method="post">
	<p align = "center">
	<input type="text" name="isbn" size="30" maxlenght="30">
	<br>
	<input type="submit" value="Sprawdź ISBN">
	<br>
	<br>
	<?php
	include 'sprawdz_isbn.php';
	?>
	</p>
	</body>
</html>
