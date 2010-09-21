var xmlhttp;

function showPart2(str)
{
xmlhttp=GetXmlHttpObject();
var url="baza2.php";
url=url+"?part="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
document.getElementById("informacja").innerHTML=xmlhttp.responseText;
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
 {
 return new XMLHttpRequest();
 }
return null;
}