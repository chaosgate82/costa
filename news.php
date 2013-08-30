<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dariocosta.eu - news and media | Aerobatic Flight Training</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Flying as a pilot since 1997 with over 5 years of all-attitude/all-envelope instructional experience in aerobatics and upset recovery training.
Conducting since 2007 studies of decision making during stall and spin recovery with development of stall/spin awareness and prevention advanced training.
From 2010 is an active aerobatic competition pilot.
In 2011 Dario was 26th FAI World Aerobatic Championships' Contest Director and in 2012 he made history by becoming the first Italian MCFI-Aerobatics. Today Dario is the Deputy Head of Training and Chief Flying Instructor at Milano JAA Flying Training Organisation." />
<meta name="keywords" content="Dario Costa, Aerobatic Instructor, Aerobatics, Aero Pilot, Aero Club Milan" />
<meta name="robots" content="index,follow" />
<meta name="author" content="Dario Costa" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="jquery.mousewheel.min.js"></script>
<script src="jquery.mCustomScrollbar.js"></script>
<link rel="stylesheet" href="jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
		
			});
</script>
<script>
    (function($){
        $(window).load(function(){
            $(".text_contatti").mCustomScrollbar();
        });
    })(jQuery);
</script>
<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
<script type="text/javascript">
		$(document).ready(function() {

			$('.fancybox').fancybox();
			
		});
</script>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div class="wrapper" >
<div class="wrapper_central">
  <div class="title">Dario Costa<span class="red"> aerobatic flight training</span></div>
  <div class="menu">
    <div class="item_menu">
    <span class="red">{</span>
    </div>
   <a href="home.php"> <div class="item_menu margLef10">
    <span class="red">h</span>ome
   </div></a>
  <a href="profile.php"> <div class="item_menu"> <span class="red">p</span>rofile</div></a><div class="item_menu underlineRed"><span class="red">n</span>ews & <span class="red">m</span>edia</div><a href="publications.php"><div class="item_menu "><span class="red">p</span>ublications</div></a>
  <a href="contatti.php"> <div class="item_menu spacer "><span class="red">c</span>ontact</div></a></span><span class="red spacer">}</span></div>
    
    <img class="img_contatti" src="news.jpg" style="margin:30px 0 0 0" />
    
   <div class="text_contatti">
<?PHP
include "administrator.class.php";	
$data = new MysqlClass();
$data->connetti();
$post_sql = $data->query("SELECT * FROM news ORDER BY id DESC");
if(mysql_num_rows($post_sql) > 0){
  while($post_obj = $data->estrai($post_sql)){
	 $id =  $post_obj->id;
	 $titolo =  $post_obj->titolo;
	 $abstract = $post_obj->abstract;
	 $text = $post_obj->text;
	 $image1 = $post_obj->image;
	 $image2 = $post_obj->image2;
	 $datas = $post_obj->data;
	 $video = $post_obj->video;
	
echo "<div class=\"news_box gallery\">";
echo "<h2>".$titolo."</h2>";
echo "<p class=\"data\">".$datas."</p>"; 
echo "<p style=\"margin:5px 0; \">".$text."</p>";
if($image1 |=""){
echo "<a class=\"fancybox\" href=\"/upload/".$image1."\">attachment 1</a>";
}
if($image2 |=""){
	echo " - <a class=\"fancybox\" href=\"/upload/".$image2."\">attachment 2</a>";
}
if($video |=""){
	echo " - <a  href=\"".$video."?rel=0&amp;autoplay=1&amp;showinfo=0&amp;autohide=1\" rel=\"prettyPhoto\">video</a>";								
}
echo "</div>";

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
</body>
</html>
