<?php
include("User.php");
class Message{
  var $title="";
  //
  var $to; 
  var $from;
  var $content = "";
  var $delivered = false;
  var $datetime;
 function __construct()
 {
   //   $this->datetime = new DateTime("2015-07-23 16:14:15.638276");
   

 }
  function setTitle()
  {
    $fr = fopen("php://stdin","r");
    fscanf($fr,"%s",$this->title);
    fclose($fr);
  }
  function getTitle()
  { 
    return $this->title;
  }  
  function writeMsg()
  {
     $fr = fopen("php://stdin","r");
    fscanf($fr,"%s",$this->content);
    fclose($fr);
  }
// should be moved to msg-handler
  function sendTo($reciever )
  {
    // add it to the reciever's inbox
    
    
  }




}
$m = new Message;
$m->setTitle();
 $fw = fopen("php://stdout","w");
fprintf($fw,"%s",$m->getTitle());
fclose($fw);

?>
