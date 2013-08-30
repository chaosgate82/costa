
<style>
body{color:#666; font-family:Verdana, Geneva, sans-serif; font-size:12px;}

.tbl_list td {padding: 2px; border-right:solid 1px #ccc; border-bottom:solid 1px #ccc}
a:link, a:hover, a:visited{ color:#666; text-decoration:none;}
input, textarea{ border:solid 1px #ccc;}
</style>
<link href="layout.css" type="text/css" rel="stylesheet">
 <div style="width:430px; height:300px; margin:0 auto;">
   
         
    <form name="form_login" method="post" action="login.php" style="margin:90px;">
    <table>
   		<tr><td><label>id:</label></td> <td><input name="nome" type="text" value="" /></td><tr>
		<tr><td><label>psw:</label> </td><td><input name="password" type="password" value="" /></td><tr>
	   <tr>	<td></td><td><input name="invia" type="submit" value="log-in" /></td><tr>
	</table>
<?php
include "administrator.class.php";	

 
if($_POST) {
	effettua_login();
} else {
	mostra_form();
}
 
function mostra_form()
{
	// mostro un eventuale messaggio
	if(isset($_GET['msg'])) {
		echo '<span style=\"color:red\">'.htmlentities($_GET['msg']).'</span>';}
	?>
   </form>
    </div>
<?php
}
function effettua_login()
{
	$nome      = trim($_POST['nome']);
	$password  = trim($_POST['password']);
	if(get_magic_quotes_gpc()) {
		 $nome      = stripslashes($nome);
		 $password  = stripslashes($password);
	}
	if(!$nome || !$password) {
		$messaggio = urlencode("Non hai inserito il nome o la password");
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
		exit;
	}
	// effettuo l'escape dei caratteri speciali per inserirli all'interno della query
	//$nome     = mysql_real_escape_string($nome);
	//$password = mysql_real_escape_string($password);	
 
 
 $data = new MysqlClass();
// connessione a MySQL
$data->connetti();
	// preparo ed invio la query
	$query = "SELECT id FROM user WHERE user = '$nome' AND psw = MD5('$password')";
	$result = mysql_query($query);
	// controllo l'esito
	if (!$result) {
		die("Errore nella query $query: " . mysql_error());
	}
 
	$record = mysql_fetch_array($result);
 	
	if(!$record) {
		
		$messaggio = urlencode('Nome utente o password errati');
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
	} else {
		session_start();
		$_SESSION['user_id'] = $record['id'];
		echo $_SESSION['user_id'];
		header("location: administrator.php");
}
}
?>