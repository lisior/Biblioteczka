<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="wybor2.js"></script>
<script type="text/javascript">
var ajax = new sack();
function getCityList(sel)
{
	var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('dhtmlgoodies_city').options.length = 0;	// Empty city select box
	if(countryCode.length>0){
		ajax.requestFile = 'getCities2.php?countryCode='+countryCode;	// Specifying which file to get
		ajax.onCompletion = createCities;	// Specify function that will be executed after file has been found
		ajax.runAJAX();		// Execute AJAX function
		//show_alert();
	}
	else
	{
		ajax.requestFile = 'getCities.php?countryCode='+'select';	// Specifying which file to get
		ajax.onCompletion = createCities;	// Specify function that will be executed after file has been found
		ajax.runAJAX();		// Execute AJAX function
		//show_alert();
	}
}
function getFirstCityList(sel)
{
	var countryCode = 'select';
		document.getElementById('dhtmlgoodies_city').options.length = 0;	// Empty city select box
	if(countryCode.length>0){
		ajax.requestFile = 'getCities.php?countryCode='+countryCode;	// Specifying which file to get
		ajax.onCompletion = createCities;	// Specify function that will be executed after file has been found
		ajax.runAJAX();		// Execute AJAX function
	}
}
function createCities()
{
	var obj = document.getElementById('dhtmlgoodies_city');
	eval(ajax.response);	// Executing the response from Ajax as Javascript code	
}

function show_alert($alert)
{
alert($alert);
}
</script>

<body onload="showPart2('')">
<head>
<title>Lista książek</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<br>
<br>
<h1>Lista książek</h1>
<form action="" method="post">
<table>
	<tr>
		<td>Autor: </td>
		<td><select id="dhtmlgoodies_country" name="dhtmlgoodies_country" onchange="showPart2(this.value)">
		<option value="">Wszyscy</option>
		<?PHP
		include 'mysql.class.php';
		$a = new mysqli_db('db58.1and1.pl', 'dbo340187176', 'albatros78pl', 'db340187176');
		//$a->connect('db58.1and1.pl', 'dbo340187176', 'albatros78pl', 'db340187176');
		$q = $a->query_select("SELECT DISTINCT autor FROM ksiazki");
		foreach($q as $i)
			{
			echo '<option value="'.$i['autor'].'">'.$i['autor'].'</option>';
			}
		
		?>
		</select>
		</td>
	</tr>
</table>

<br>

<br>
<div id="informacja">Opis wybranej ksiażki:</div>
<br>
<br>
<p><a href="index.php">POWRÓT</a></p>
</form>
</head>
</body>
