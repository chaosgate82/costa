<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elimina publicazioni</title>
<style>
body{color:#666; font-family:Verdana, Geneva, sans-serif; font-size:12px;}

.tbl_list td {padding: 2px; border-right:solid 1px #ccc; border-bottom:solid 1px #ccc}

input, textarea{ border:solid 1px #ccc;}
</style>
</head>

<body>

<h1>Admin Panel</h1>
<p>Elimina pubblicazioni</p> 
<p><a href="http://www.dariocosta.eu/administrator.php">Torna alla lista</a></p>
<?PHP

include "administrator.class.php";	
$data = new MysqlClass();
 $id = $_GET["id"];
// connessione a MySQL
$data->connetti();


$istruzione ="DELETE from  news WHERE id = '$id' ";
$query = mysql_query($istruzione) or die (mysql_error());

echo "news eliminata con successo!";
header('Refresh: 1; url=administrator_news.php'); 


?>








</body>
</html>