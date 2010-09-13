<?
function lacz_baza()
{
require 'baza.php';
$db = mysql_pconnect($host,$user,$passwd);
if (!$db)
{
echo 'B??D!!!';
exit;
}
//@mysql_query('set names latin2;');
//echo '<p>BAZA OTWARTA</p>';
mysql_select_db($baza);
}
?>