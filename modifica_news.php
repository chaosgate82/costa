<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifica News</title>
<style>
body{color:#666; font-family:Verdana, Geneva, sans-serif; font-size:12px;}

.tbl_list td {padding: 2px; border-right:solid 1px #ccc; border-bottom:solid 1px #ccc}

input, textarea{ border:solid 1px #ccc;}
</style>
</head>

<body>

<h1>Admin Panel</h1>
<h2>Modifica news</h2> 
<p><a href="http://www.dariocosta.eu/administrator_news.php">Torna alla lista</a></p>
<?PHP

include "administrator.class.php";	
$data = new MysqlClass();
$id = $_GET["id"];
// connessione a MySQL
$data->connetti();

if(!isset($_POST['submit']))
{
	if(!isset($_POST['submit_allegato']))
	{
$post_sql = $data->query("SELECT * FROM news WHERE id = $id");
// controllo sul numero di records presenti in tabella
if(mysql_num_rows($post_sql) > 0){
  // estrazione dei record tramite ciclo
  while($post_obj = $data->estrai($post_sql)){
     $titolo = $post_obj->titolo;
	 $titolo = strip_tags($titolo);
	$text = $post_obj->text;
	$image1 = $post_obj->image;
	$image2 = $post_obj->image2;
	$video = $post_obj->video;
	$id= $post_obj->id;
	$datas = $post_obj->data;
//echo	"<tr><td>".$id."</td><td>".$titolo."</td><td>".$li1."</td><td>".$li2."</td><td>".$sommario."</td><td>".$link."</td><td><a href=\"modifica_news.php?id=".$id."\">modifica</a></td></tr>";
  }
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input name="id" type="hidden"  maxlength="5" value="<?PHP  echo $id; ?>"/>
<table>


<tr><td><label>Titolo:</label></td><td><input name="titolo" type="text" maxlength="100" size="70" value="<?PHP  echo htmlentities($titolo); ?>"> </td></tr>

<tr><td><label>Data:</label></td><td><input name="data" type="text" size="20" maxlength="20" value="<?PHP  echo $datas; ?>" /></td></tr>

<tr><td><label>Url Youtube:</label></td><td><input name="video" maxlength="180" value="<?PHP  echo $video; ?>" size="70" /></td></tr>

<tr><td><label>Abstract:</label></td><td><textarea name="sommario" rows="4" cols="50"><?PHP  echo $text; ?></textarea></td></tr>

<tr><td></td><td>
<INPUT type="SUBMIT" name="submit" value="modifica"> </td></tr>
</table>

</form>
<br /><br />
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input name="id" type="hidden"  maxlength="5" value="<?PHP  echo $id; ?>"/>
<tr><td><label>Allegato 1:</label></td><td><input name="MAX_FILE_SIZE" type="hidden" value="1024000" /><input id="file1" name="file1" type="file" /></td></tr>

<tr><td><label>Allegato 2:</label></td><td><input name="MAX_FILE_SIZE" type="hidden" value="1024000" /><input id="file2" name="file2" type="file" /></td></tr>
<tr><td></td><td>
<INPUT type="SUBMIT" name="submit_allegato" value="cambia"> </td></tr>
</form>
<?PHP
} 
else{
	
	
	

move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $_FILES["file1"]["name"]);
//echo "Nome file è:". $_FILES["file1"]["name"];
echo "File caricato in: " . "upload/" . $_FILES["file1"]["name"];
//$name_new_image1 = "upload/thumbs/".$_FILES["file1"]["name"]."_thumb.jpg"; //nome dell'immagine ridimensionata (dove verà salvata dallo script)
    $file1 = $_FILES["file1"]["name"];

	

move_uploaded_file($_FILES["file2"]["tmp_name"], "upload/" . $_FILES["file2"]["name"]);
//echo "Nome file è:". $_FILES["file1"]["name"];
echo "File caricato in: " . "upload/" . $_FILES["file2"]["name"];
//$name_new_image1 = "upload/thumbs/".$_FILES["file1"]["name"]."_thumb.jpg"; //nome dell'immagine ridimensionata (dove verà salvata dallo script)
    $file2 = $_FILES["file2"]["name"];

	$id = ($_POST["id"]);
echo "questo sarebbe l'id".$id = addslashes($id);

$istruzione2 ="UPDATE  news SET  image = '$file1', image2 = '$file2' WHERE id = '$id' ";
$query2 = mysql_query($istruzione2) or die (mysql_error());

echo "modifica effettuata con successo!";
//header("refresh:1; url=administrator.php");
	
	
	
	
}


}else{
	
$titolo = strip_tags($_POST["titolo"]);
$titolo = addslashes($titolo);


$text = strip_tags($_POST["sommario"]);
$text = addslashes($text);



/*
$allegato1 = strip_tags($_POST["allegato1"]);
$allegato1 = addslashes($allegato1);


$allegato2 = strip_tags($_POST["allegato2"]);
$allegato2 = addslashes($allegato2);
*/

$datas = strip_tags($_POST["data"]);
$datas = addslashes($datas);


$id = strip_tags($_POST["id"]);
$id = addslashes($id);
$video = ($_POST["video"]);
$istruzione ="UPDATE  news SET titolo = '$titolo', text = '$text', data = '$datas',video = '$video' WHERE id = '$id' ";
$query = mysql_query($istruzione) or die (mysql_error());

echo "modifica effettuata con successo!";
//header("refresh:1; url=administrator.php"); 
}

?>
</body>
</html>