<?php
if(isset($_GET['countryCode']))
	{
	include 'mysql.class.php';
	$a = new mysqli_db('db58.1and1.pl', 'dbo340187176', 'albatros78pl', 'db340187176');
	//$a->connect('db58.1and1.pl', 'dbo340187176', 'albatros78pl', 'db340187176');
	echo "obj.options[obj.options.length] = new Option('wybierz','0');";
	$q = $a->query_select("SELECT ksiazkaid,tytul FROM ksiazki");
	foreach($q as $i)
		{
		echo "obj.options[obj.options.length] = new Option('".$i['tytul']."','".$i['ksiazkaid']."');
";
		}
	//$a->destruct();
	}
//".mysql_real_escape_string($_GET['countryCode'])."
	?>
