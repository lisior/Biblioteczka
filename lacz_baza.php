<?
function lacz_baza()
{
@ $db = mysql_pconnect('db58.1and1.pl','dbo340187176','albi78pl');
if (!$db)
{
echo 'B£¥D!!!';
exit;
}
//echo '<p>BAZA OTWARTA</p>';
mysql_select_db('db340187176');
}
?>