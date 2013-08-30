<?php
session_start();
if(!isset($_SESSION['user_id']))
{
header("location: login.php");
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration Panel - Publication manager</title>
<style>
body{color:#666; font-family:Verdana, Geneva, sans-serif; font-size:12px;}

.tbl_list td {padding: 2px; border-right:solid 1px #ccc; border-bottom:solid 1px #ccc}
a:link, a:hover, a:visited{ color:#666; text-decoration:none;}
input, textarea{ border:solid 1px #ccc;}
</style>
<script language="javascript" type="text/javascript" src="tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
  tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    elements : "elm1",
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap",
    theme_advanced_buttons3 : "",
    height:"350px",
    width:"600px"
});

</script>
</head>
<body>
<?PHP
include "administrator.class.php";	
if(!isset($_POST['submit']))
{
?>	
<h1>Admin Panel</h1>
<h2>Inserisci publicazioni | <a href="administrator_news.php">Gestisci le news</a> </h2>  
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr><td><label>Titolo:</label></td><td><input name="titolo" type="text" maxlength="100" size="70" /></td></tr>

<tr><td><label>link:</label></td><td><input name="link" type="text" maxlength="100"  size="70"/></td></tr>
<tr><td></td><td>(inserire il link con http://)</td></tr>
<tr><td><label>Voce 1:</label></td><td><input name="voce1" type="text" size="30" maxlength="50" /></td></tr>

<tr><td><label>Voce 2:</label></td><td><input name="voce2" type="text" size="30" maxlength="50" /></td></tr>

<tr><td><label>Abstract:</label></td><td><textarea name="sommario" rows="4" cols="50" ></textarea></td></tr>

<tr><td></td><td><INPUT type="SUBMIT" name="submit" value="Inserisci"> </td></tr>
</table>

</form>
	
<?PHP	
}
else
{

	

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





$data = new MysqlClass();
// connessione a MySQL
$data->connetti();
$istruzione ="INSERT INTO publicazioni (titolo,link,li1,li2,sommario) VALUES ('$titolo','$link','$voce1','$voce2','$sommario')";
$query = mysql_query($istruzione) or die (mysql_error());
// disconnessione
echo "inserimento avvenuto con successo!";
header("refresh:1; url=administrator.php"); 

}  
?>
<h2>Lista publicazioni online</h2>
<table class="tbl_list">
<tr style="background:DDD; font-weight:bold; color:#960018"><td>id</td><td>titolo</td><td>voce 1</td><td>voce 2</td><td>abstract</td><td>link</td><td>modifica</td><td>elimina</td></tr>

<?PHP

$data = new MysqlClass();
// connessione a MySQL
$data->connetti();
$post_sql = $data->query("SELECT * FROM publicazioni ORDER BY id DESC");
// controllo sul numero di records presenti in tabella
if(mysql_num_rows($post_sql) > 0){
  // estrazione dei record tramite ciclo
  
  while($post_obj = $data->estrai($post_sql)){
    $titolo = $post_obj->titolo;
	$li1 = $post_obj->li1;
	$li2 = $post_obj->li2;
	$sommario = $post_obj->sommario;
	$link = $post_obj->link;
	$id= $post_obj->id;
	
echo	"<tr><td>".$id."</td><td>".$titolo."</td><td>".$li1."</td><td>".$li2."</td><td>".$sommario."</td><td>".$link."</td><td><a href=\"modifica_pub.php?id=".$id."\">modifica</a></td><td><a href=\"elimina_pub.php?id=".$id."\">elimina</a></td></tr>";

  }
}

?>
</table>


</body>
</html>