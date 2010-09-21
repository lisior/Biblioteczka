<?php
//echo $isbns;
require 'lacz_baza.php';
lacz_baza();
$q = mysql_fetch_array(mysql_query('SELECT count(*) FROM ksiazki WHERE isbn = "'.$isbns.'"'));

if ($q[0]) 
	{
	echo 'KSIĄŻKA JEST W BAZIE';
	}
else 
	{
	echo 'KSIĄŻKI NIE MA W BAZIE';
	}
?>