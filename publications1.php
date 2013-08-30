<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dariocosta.eu - publications | Aerobatic Flight Training</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="jquery.mousewheel.min.js"></script>
<script src="jquery.mCustomScrollbar.js"></script>
<script>
    (function($){
        $(window).load(function(){
            $(".text_contatti").mCustomScrollbar();
        });
    })(jQuery);
</script>
<meta name="robots" content="index,follow" />
<meta name="author" content="Dario Costa" />
<meta name="keywords" content="Dario Costa, Dario Costa publications, publication of Dario Costa,  Aerobatic Instructor, Aerobatics, Aero Pilot, Aero Club Milan" />
<meta name="description" content="Flying as a pilot since 1997 with over 5 years of all-attitude/all-envelope instructional experience in aerobatics and upset recovery training.
Conducting since 2007 studies of decision making during stall and spin recovery with development of stall/spin awareness and prevention advanced training.
From 2010 is an active aerobatic competition pilot.
In 2011 Dario was 26th FAI World Aerobatic Championships' Contest Director and in 2012 he made history by becoming the first Italian MCFI-Aerobatics. Today Dario is the Deputy Head of Training and Chief Flying Instructor at Milano JAA Flying Training Organisation." />
<meta name="keywords" content="Aerobatic Instructor Pilot and Examiner" />
</head>

<body>

<?php include_once("analyticstracking.php") ?>
<div class="wrapper" > 
  <div class="wrapper_central">
  <div class="title">Dario Costa <span class="red">aerobatic flight training</span> </div>
    <div class="menu">
    <div class="item_menu">
    <span class="red">{</span>
    </div>
   <a href="home.php"> <div class="item_menu margLef10">
    <span class="red">h</span>ome
    </div></a>
  <a href="profile.php"> <div class="item_menu"> <span class="red">p</span>rofile</div></a><a href="news.php"><div class="item_menu"><span class="red">n</span>ews & <span class="red">m</span>edia</div></a><div class="item_menu underlineRed"><span class="red">p</span>ublications</div>
  <a href="contatti.php"> <div class="item_menu spacer "><span class="red">c</span>ontact</div></a></span><span class="red spacer">}</span></div>
    <img class="img_contatti" src="publications.jpg" style="margin:30px 0 0 0"/>
    <div class="text_contatti">
 <?PHP
 include "administrator.class.php";	
$data = new MysqlClass();
$data->connetti();
$post_sql = $data->query("SELECT * FROM publicazioni ORDER BY id DESC");
if(mysql_num_rows($post_sql) > 0){
  while($post_obj = $data->estrai($post_sql)){
    $titolo = $post_obj->titolo;
	$li1 = $post_obj->li1;
	$li2 = $post_obj->li2;
	$sommario = $post_obj->sommario;	
if($post_obj->link == ""){	
echo "<h2>".$titolo."</h2>";
}else{
	echo "<a target=\"_blank\" href=\"".$post_obj->link."\"><h2>".$titolo."</h2></a>";
	}
echo"<ul><li>".$li1."</li>

		<li>".$li2."</li>
</ul>";
echo "<p>".$sommario."<p>";	
	 }
}else{
  // notifica in assenza di record in tabella
  echo "Per il momento non sono disponibili post.";
}
?>
 </div>
 <div style="width:770px;float:left;clear:both; margin:11px 0 0 0">
    <div class="social_bar"  style="clear:none;"><a href="https://twitter.com/costadario1" target="_blank"><img src="tweet.jpg" width="33" height="28" alt="tweet" border="0" /></a><a href="http://www.facebook.com/costadario1?ref=ts&fref=ts"><img src="facebook.jpg" width="33" height="28" alt="facebook" border="0" /></a><a href="http://www.linkedin.com/in/dariocosta1" target="_blank"><img src="linkedin.jpg" width="32" height="28" alt="linkedin" border="0" /></a> </div>
	<div class="social_bar"  style="float:left; clear:none;">
	<a href="http://www.alpinestars.com/" target="_blank"><img src="alpinesatr_small.jpg " width="65" height="28" alt="Alpinestar" border="0" /></a>
	<span style="margin:0 0 0 8px"><img src="ontherun_small.jpg" width="49" height="32" alt="OnTheRuNEsso" border="0" /></span>
	<a style="margin:0 0 0 12px" href="http://www.qpabrake.it/it/" target="_blank"><img src="opa_small.jpg" width="30" height="30" alt="Opa" border="0" /></a> </div>
</div>
	
	</div>
</div>
</body>
</html>