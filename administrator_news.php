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
<title>Administrator panel - News-Events manager</title>
<style>
body{color:#666; font-family:Verdana, Geneva, sans-serif; font-size:12px;}
.tbl_list td {padding: 2px; border-right:solid 1px #ccc; border-bottom:solid 1px #ccc}
input, textarea{ border:solid 1px #ccc;}
a:link, a:hover, a:visited{ color:#666; text-decoration:none;}
</style>
</head>
<body>
<?PHP
require_once "administrator.class.php";


if(!isset($_POST['submit']))
{
?>	
<h1>Admin Panel</h1>
<h2>Inserisci news&events | <a href="administrator.php">Gestisci le publicazioni</a> </h2>  
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<table>
<tr><td><label>Titolo:</label></td><td><input name="titolo" type="text" maxlength="100" size="60" /></td></tr>
<tr><td><label>Data:</label></td><td><input name="data" type="text" maxlength="100" size="20"/></td></tr>
<tr><td><label>Allegato 1:</label></td><td><input name="MAX_FILE_SIZE" type="hidden" value="1024000" /><input id="file1" name="file1" type="file" /></td></tr>
<tr><td><label>Allegato 2:</label></td><td><input name="MAX_FILE_SIZE" type="hidden" value="1024000" /><input id="file2" name="file2" type="file" /></td></tr>
<tr><td><label>Url youtube:</label></td><td><input name="video" type="text" maxlength="150" size="60" /></td></tr>
<tr><td><label>Abstract:</label></td><td><textarea name="sommario" rows="4" cols="50" ></textarea></td></tr>
<tr><td></td><td><INPUT type="SUBMIT" name="submit" value="Inserisci"></td></tr>
</table>
</form>
<?PHP	
}
else
{	

$titolo = strip_tags($_POST["titolo"]);
$titolo = addslashes($titolo);
$data = strip_tags($_POST["data"]);
$data = addslashes($data);
$sommario = strip_tags($_POST["sommario"]);
$sommario = addslashes($sommario);
$video = strip_tags($_POST["video"]);
//sposto il file caricato dalla cartella temporanea alla destinazione finale
move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $_FILES["file1"]["name"]);
//echo "Nome file è:". $_FILES["file1"]["name"];
echo "File caricato in: " . "upload/" . $_FILES["file1"]["name"];
//$name_new_image1 = "upload/thumbs/".$_FILES["file1"]["name"]."_thumb.jpg"; //nome dell'immagine ridimensionata (dove verà salvata dallo script)
    $file1 = $_FILES["file1"]["name"]; 
	//sposto il file caricato dalla cartella temporanea alla destinazione finale
move_uploaded_file($_FILES["file2"]["tmp_name"], "upload/" . $_FILES["file2"]["name"]);
echo "File caricato in: " . "upload/" . $_FILES["file2"]["name"];
//$name_new_image2 = "upload/thumbs/".$_FILES["file2"]["name"]."_thumb.jpg"; //nome dell'immagine ridimensionata (dove verà salvata dallo script)
    $file2 = $_FILES["file2"]["name"]; //immagine della quale si vuole fare il ridimensionamento

    /*$width2 = 130; //larghezza immagine ridimensionata
    $height2 = 70; //altezza immagine ridimensionata
    $qualita2 = 100; //qualità dell'immagine (0 - 100)
    $new_image2 = imagecreatetruecolor($width2, $height2);
    $src_image2 = imagecreatefromjpeg("upload/".$file2);
    imagecopyresized($new_image2, $src_image2, 0, 0, 0, 0, $width2, $height2, imagesx($src_image2), imagesy($src_image2));
    imagejpeg($new_image2, $name_new_image2, $qualita2);
*/
$image1 = $file1;
$image2 = $file2;

$data2 = new MysqlClass();
// connessione a MySQL
$data2->connetti();
$istruzione2 ="INSERT INTO news (titolo,text,image,image2,data,video) VALUES ('$titolo','$sommario','$file1','$file2','$data','$video')";
$query2 = mysql_query($istruzione2) or die (mysql_error());
// disconnessione
echo "News inserita con successo!";
header('Refresh: 2; url=administrator_news.php');  
}  
?>
<h2>Lista news online</h2>
<table class="tbl_list">
<tr style="color:#960018; font-weight:bold;"><td>id</td><td>titolo</td><td>data</td><td>immagine 1</td><td>immagine 2</td><td>sommario</td><td>url youtube</td><td>modifica</td><td>elimina</td></tr>
<?PHP

// connessione a MySQL
$data = new MysqlClass();
// connessione a MySQL
$data->connetti();
$post_sql = $data->query("SELECT * FROM news ORDER BY id DESC");
// controllo sul numero di records presenti in tabella
if(mysql_num_rows($post_sql) > 0){
  // estrazione dei record tramite ciclo
  
  while($post_obj = $data->estrai($post_sql)){
    $titolo = $post_obj->titolo;
	$text = $post_obj->text;
	$image1 = $post_obj->image;
	$image2 = $post_obj->image2;
	//$link = $post_obj->link;
	$id= $post_obj->id;
	$datas = $post_obj->data;
	$video = $post_obj->video;
	echo	"<tr><td>".$id."</td><td>".$titolo."</td><td>".$datas."</td><td>".$image1."</td><td>".$image2."</td><td>".$text."</td>
<td>".$video."</td><td><a href=\"modifica_news.php?id=".$id."\">modifica</a></td><td><a href=\"elimina_news.php?id=".$id."\">elimina</a></td></tr>";
	}
}
?>
</table>
</body>
</html>