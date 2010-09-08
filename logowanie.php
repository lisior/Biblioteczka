<?php
if (substr($SERVER_SOFTWARE, 0 ,9) == 'Micorsoft' &&
	!isset($PHP_AUTH_USER) &&
	!isset($PHP_AUTH_PW) &&
	substr($HTTP_AUTHORIZATION,0 ,6) == 'Basic'
	)
	{
	list($PHP_AUTH_USER, $PHP_AUTH_PW) =
	explode(':', base64_decode(substr($HTTP_AUTHORIZATION, 6)));
	}
	if ($PHP_AUTH_USER != 'uzytkownik' || $PHP_AUTH_PW != 'haslo')
	{
	header('WWW-Authenticate: Basic realm="Biblioteczka"');
	if (substr($SERVER_SOFTWARE,0 ,9) == 'Microsoft')
	header('Status: 401 Unauthorized');
	else 
	header('HTTP/1.0 401 Unauthorized');
	
	echo '<h1> Brak uprawnień!!</h1>';
	}
	else
	{
	echo '<h1> Access granted </h1>';
	}
	?>
	