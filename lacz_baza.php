<?
function lacz_baza()
{
@ $db = mysql_pconnect('###','###','###');
if (!$db)
{
echo 'B��D!!!';
exit;
}
//echo '<p>BAZA OTWARTA</p>';
mysql_select_db('###');
}
?>