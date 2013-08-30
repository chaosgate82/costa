<?php
class MysqlClass
{
  // parametri per la connessione al database
  private $nomehost = "62.149.150.168";    
  private $nomeuser = "Sql590467";         
  private $password = "7bf74d16";
  private $nomedb   = "Sql590467_1";
          
  // controllo sulle connessioni attive
  private $attiva = false;
 
  // funzione per la connessione a MySQL
  public function connetti()
 {
   if(!$this->attiva)
    {
     if($connessione = mysql_connect($this->nomehost,$this->nomeuser,$this->password) or die (mysql_error()))
      {
       // selezione del database
       $selezione = mysql_select_db($this->nomedb,$connessione) or die (mysql_error());
      }
     }else{
       return true;
     }
    }
	
	
	public function query($sql)
 {
  if(isset($this->attiva))
  {
  $sql = mysql_query($sql) or die (mysql_error());
  return $sql;
  }else{
  return false;
  }
 }



	
	public function disconnetti()
{
        if($this->attiva)
        {
                if(mysql_close())
                {
         $this->attiva = false;
             return true;
                }else{
                        return false;
                }
        }
 }
 
 
 public function estrai($risultato)
 {
  if(isset($this->attiva))
  {
  $r = mysql_fetch_object($risultato);
  return $r;
  }else{
  return false;
  }
 }
 
 
 
 
}   


 class SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 echo "Stampo il nome file:".$filename;
     // $image_info = getimagesize($filename);
    //  $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
 
}
?>