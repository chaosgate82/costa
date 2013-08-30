<?PHP
 
 include "administrator.class.php";	
	$data = new MysqlClass();
// connessione a MySQL
$data->connetti();
 
 $id= $_GET["id"]; 
 $post_sql = $data->query("SELECT image FROM news where id=$id");
// controllo sul numero di records presenti in tabella
if(mysql_num_rows($post_sql) > 0){
  // estrazione dei record tramite ciclo
  
  while($post_obj = $data->estrai($post_sql)){
	 $image1 =  $post_obj->image;
	 
	 	echo "<img src=\"/upload/".$image1."\" />";
	  
  /*  $titolo = $post_obj->titolo;
	
	$li1 = $post_obj->li1;
	
	$li2 = $post_obj->li2;
	
	$abstract = $post_obj->abstract;
	$text = $post_obj->text;
	$image1 = $post_obj->image;
	
	

	
	
	
	$image2 = $post_obj->image2;*/
	
  }
  }
 
 
 ?>