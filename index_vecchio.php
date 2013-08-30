<script src="fixedbackground.js" type="text/javascript"></script>
<!--  prelevato ed illustrato su http://www.web-link.it // -->
<html>
<title>Dariocosta.eu | Aerobatic Flight Training</title>
<head>
<meta name="description" content="Flying as a pilot since 1997 with over 5 years of all-attitude/all-envelope instructional experience in aerobatics and upset recovery training.
Conducting since 2007 studies of decision making during stall and spin recovery with development of stall/spin awareness and prevention advanced training.
From 2010 is an active aerobatic competition pilot.
In 2011 Dario was 26th FAI World Aerobatic Championships' Contest Director and in 2012 he made history by becoming the first Italian MCFI-Aerobatics. Today Dario is the Deputy Head of Training and Chief Flying Instructor at Milano JAA Flying Training Organisation." />
<meta name="keywords" content="Dario Costa, Aerobatic Instructor, Aerobatics, Aero Pilot, Aero Club Milan" />
<meta name="robots" content="index,follow" />
<meta name="author" content="Dario Costa" />
<meta name="google-site-verification" content="mRbbzeiR1KKF_Yn4h9ct00mEAncQPFCofbgj_jPyg84" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">

$(function() {   
		
			var $window       = $(window),
			    $bg              = $('#bg', document.body),
			    aspectRatio      = $bg.width() / $bg.height();
			    			    		
			function resizeBg() {
				
				if ( ($window.width() / $window.height()) < aspectRatio ) {
				    $bg
				    	.removeClass()
				    	.addClass('bgheight');
				} else {
				    $bg
				    	.removeClass()
				    	.addClass('bgwidth');
				}
							
			}
			                   			
			$window.resize(function() {
				resizeBg();
			}).trigger('resize');
		
});


</script>
<style>
a:link, a:visited { text-decoration:none;}

* { 
	margin: 0; 
	padding: 0; 
}
	
#bg { 
	position: fixed; 
	background: #000;
	top: 0; 
	left: 0; 
}
.bgwidth { width: 100%; }
.bgheight { height: 100%; }
		
#page { 
	position: relative; 
	width: 50%; 
	padding: 1em;
	margin: 5em auto;
	background: #000;
	line-height: 1.4;
	font: 95% Arial, sans-serif;
}

#page p {
	padding: 0.5em;
}
</style>
</head>
<body><!-- style="background-image:url('back.jpg'); width:100%;" -->
<img src="ha.jpg" alt="" id="bg" />
<!-- onLoad="fixedBackground('back.jpg');"  -->
<?PHP /*
include "administrator.class.php";	
$data = new MysqlClass();
$data->connetti();
$vuoto="";
$post_sql = $data->query("SELECT video FROM news WHERE video != '' ORDER BY id DESC LIMIT 1");
if(mysql_num_rows($post_sql) > 0){
  while($post_obj = $data->estrai($post_sql)){
	 $video =  $post_obj->video;
	 
  $sub1 = substr($video, 29); */
?>
<!--
<div class="wrapper" style="border: none;">
	<div class="box_video_hp">      
	<iframe style="margin: 0 auto; width:560px; height: 315px;" width="560" height="315" src="http://www.youtube.com/embed/<?PHP // echo $sub1; }} ?>?rel=0&amp;autoplay=1&amp;showinfo=0&amp;autohide=1" frameborder="0"></iframe>
	</div>
</div>    
    -->
<div class="box_fly">
		<a href="home.php">
			<img class="press_fly_btn" src="aero.png" alt="Press to Fly - Dario Costa Aerobatics" border="0"/>
		</a>
<br />
<p class="press_fly_txt">press to fly</p>
</div>
</body>
</html>