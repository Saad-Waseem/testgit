<?php
include_once ("DBHandler.php");

class Signup{
  
  var $db;
  function __construct()
  {
    $this->db = new DBHandler;
  }
  function createUser($user)
  {
    $fw = fopen("php://stdout","w");
    $fr = fopen("php://stdin","r");
 
    if($this->db->insert($user))
    {
      fprintf($fw,"%s","Signup successful\n ");
    }
    else
      fprintf($fw,"%s","Name Already exist try something else"."\n");
    fclose($fw);
 fclose($fr);   
    
  }
}
?>
