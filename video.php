<html>
<body style="background:#000;">
<?PHP

$id = $_GET["id"];
include "administrator.class.php";	
	$data = new MysqlClass();
$data->connetti();
 $post_sql = $data->query("SELECT * FROM news WHERE id = $id");
// controllo sul numero di records presenti in tabella
if(mysql_num_rows($post_sql) > 0){
  while($post_obj = $data->estrai($post_sql)){
	 $video =  $post_obj->video;
  }
}

?>
<iframe width="560" height="315" frameborder="0" src="<?PHP echo $video; ?>?rel=0&amp;autoplay=1&amp;showinfo=0&amp;autohide=1" style="margin: 0 auto; width:560px; height: 315px;"></iframe>

</body>
</html>