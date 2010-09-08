<?php
require 'lacz_baza.php';
lacz_baza();
$zapytanie = "delete from pozyczone";
$wynik = mysql_query($zapytanie);

$zapytanie = "ALTER TABLE `pozyczone` PACK_KEYS =1 CHECKSUM =1 DELAY_KEY_WRITE =1 AUTO_INCREMENT =1";
$wynik = mysql_query($zapytanie);
?>
<br /><br />
<p><a href="http://ksiazki.lisior.pl">POWRÓT</a></p>
