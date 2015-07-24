<?php
include("DBHandler.php");
class Signin
{
  var $email;
  var $pwd;
  var $isloggedin ;
  var $db;
  function __construct()
  {
    $this->email = "";
    $this->pwd = "";
    $this->isloggedin = false ;
    $db = new DBHandler;
  }
  function enterCredentials()
  {

    $fw =fopen("php://stdout" , "w");
    $fr = fopen("php://stdin", "r");
    fprintf($fw,"%s","Enter email: ");
    fscanf($fr,"%s",$this->email);    
    fprintf($fw,"%s","Enter password: ");
    fscanf($fr,"%s",$this->pwd);  
    fclose($fr);
    fclose($fw);
  }
  function search()
  {
    if($db->select($this->email,$this->pwd))
    {
      $this->isloggedin = true;
  $fw =fopen("php://stdout" , "w");
      fprintf($fw,"%s","Login Successful\n ");
      fclose($fw);
    }

    if($this->isloggedin== false )
    {
      $fw =fopen("php://stdout" , "w");
      fprintf($fw,"%s","Login failed Either you don't have any accoutnor have enterd wrong information\n ");
      fclose($fw);

    }
  }

}
?>
