<script type="text/javascript">
function show_alert($alert)
{
alert($alert);
}
</script>
<?php
$isbna = $_POST['isbn'];
if ($isbna != '')
	{
	$isbn = trim($isbna);
	$isbns = str_replace (' ','',$isbn);
	$isbn2 = str_replace ('-','',$isbns);
	$dl = strlen($isbn2);
		if ($dl == 13)
		{
		$isbn3 = substr($isbn2,0,12);
		$kont = (substr($isbn3,0,1)*1)+(substr($isbn3,1,1)*3)+(substr($isbn3,2,1)*1)+(substr($isbn3,3,1)*3)+(substr($isbn3,4,1)*1)+(substr($isbn3,5,1)*3)+(substr($isbn3,6,1)*1)+(substr($isbn3,7,1)*3)+(substr($isbn3,8,1)*1)+(substr($isbn3,9,1)*3)+(substr($isbn3,10,1)*1)+(substr($isbn3,11,1)*3)+(substr($isbn3,12,1)*1);
		if ($kont != 0)
		{
		$cyfra = $kont % 10;
			if ($cyfra == 0)
			{
			$cyfra2 = 0;
			}
			else
			{
			$cyfra2 = 10 - $cyfra;
			}
			if (substr($isbn2,12,1) == $cyfra2)
			{
			echo '<script type="text/javascript">show_alert("'.$isbn2.' - ISBN PRAWIDŁOWY");</script>';
			include 'sprawdz_w_bazie.php';
			}
			else
			{
			echo '<script type="text/javascript">show_alert("'.$isbn.' - ISBN BŁĘDNY");</script>';
			}
		}
		else
		{
		echo '<script type="text/javascript">show_alert("'.$isbn.' - ISBN BŁĘDNY");</script>';
		}
		}
		
		else
		{
		$isbn3 = substr($isbn2,0,9);
		$kont = (substr($isbn3,0,1)*1)+(substr($isbn3,1,1)*2)+(substr($isbn3,2,1)*3)+(substr($isbn3,3,1)*4)+(substr($isbn3,4,1)*5)+(substr($isbn3,5,1)*6)+(substr($isbn3,6,1)*7)+(substr($isbn3,7,1)*8)+(substr($isbn3,8,1)*9);
		if ($kont != 0)
		{
		$cyfra = $kont % 11;
			if (substr($isbn2,9,1) == $cyfra)
			{
			echo '<script type="text/javascript">show_alert("'.$isbn2.' - ISBN PRAWIDŁOWY");</script>';
			include 'sprawdz_w_bazie.php';
			}
			else
			{
			echo '<script type="text/javascript">show_alert("'.$isbn.' - ISBN BŁĘDNY");</script>';
			}
		}	
		else
		{
		echo '<script type="text/javascript">show_alert("'.$isbn.' - ISBN BŁĘDNY");</script>';
		}
		}
	}	
	else
	{
	
	}
	
?>