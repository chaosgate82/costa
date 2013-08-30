<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
<style>
body{color:#666; font-family:Verdana, Geneva, sans-serif; font-size:12px;}

.tbl_list td {padding: 2px; border-right:solid 1px #ccc; border-bottom:solid 1px #ccc}

input, textarea{ border:solid 1px #ccc;}
</style>
</head>

<body>

<h1>Admin Panel</h1>
<h2>Modifica publicazioni</h2> 
<p><a href="http://www.dariocosta.eu/administrator.php">Torna alla lista</a></p>
<?PHP

include "administrator.class.php";	
$data = new MysqlClass();
$id = $_GET["id"];
// connessione a MySQL
$data->connetti();

if(!isset($_POST['submit']))
{
$post_sql = $data->query("SELECT * FROM publicazioni WHERE id = $id");
// controllo sul numero di records presenti in tabella
if(mysql_num_rows($post_sql) > 0){
  // estrazione dei record tramite ciclo
  while($post_obj = $data->estrai($post_sql)){
    $titolo = $post_obj->titolo;
	$voce1 = $post_obj->li1;
	$voce2 = $post_obj->li2;
	$sommario = $post_obj->sommario;
	$link = $post_obj->link;
	$id= $post_obj->id;	
//echo	"<tr><td>".$id."</td><td>".$titolo."</td><td>".$li1."</td><td>".$li2."</td><td>".$sommario."</td><td>".$link."</td><td><a href=\"modifica_news.php?id=".$id."\">modifica</a></td></tr>";
  }
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input name="id" type="hidden"  maxlength="5" value="<?PHP  echo $id; ?>"/>
<table>
<tr><td><label>Titolo:</label></td><td><input name="titolo" type="text" maxlength="100" size="70" value="<?PHP  echo htmlentities($titolo); ?>" /></td></tr>

<tr><td><label>link:</label></td><td><input name="link" type="text" size="70" maxlength="100" value="<?PHP  echo $link; ?>" /></td></tr>
<tr><td></td><td>(inserire il link con http://)</td></tr>

<tr><td><label>Voce 1:</label></td><td><input name="voce1" type="text" maxlength="50" size="30" value="<?PHP  echo htmlentities($voce1); ?>"/></td></tr>

<tr><td><label>Voce 2:</label></td><td><input name="voce2" type="text" maxlength="50" size="30" value="<?PHP  echo htmlentities($voce2); ?>" /></td></tr>

<tr><td><label>Abstract:</label></td><td><input name="sommario" type="text" maxlength="100" size="70" value="<?PHP  echo htmlentities($sommario); ?>" /></td></tr>

<tr><td></td><td>
<INPUT type="SUBMIT" name="submit" value="modifica"> </td></tr>
</table>

</form>

<?PHP
} 
else{
	
$titolo = strip_tags($_POST["titolo"]);
$titolo = addslashes($titolo);
$sommario = strip_tags($_POST["sommario"]);
$sommario = addslashes($sommario);
$voce1 = strip_tags($_POST["voce1"]);
$voce1 = addslashes($voce1);
$link = strip_tags($_POST["link"]);
$link = addslashes($link);
$voce2 = strip_tags($_POST["voce2"]);
$voce2 = addslashes($voce2);
$id = strip_tags($_POST["id"]);
$id = addslashes($id);

$istruzione ="UPDATE  publicazioni SET titolo = '$titolo',link = '$link', li1 = '$voce1', li2 = '$voce2', sommario = '$sommario' WHERE id = '$id' ";
$query = mysql_query($istruzione) or die (mysql_error());

echo "modifica effettuata con successo!";
header("refresh:1; url=administrator.php"); 
}

?>
</body>
</html>