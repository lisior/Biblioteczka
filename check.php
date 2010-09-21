<?php
session_start();
?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
	<title>podstrona</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
if($_SESSION["zalogowany"]==0){echo "nie masz dostępu do tej części witryny. <a href='index.php'>Zaloguj się </a></body></html>;"; exit();}
?>