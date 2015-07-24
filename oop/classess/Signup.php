<?php
include ("DBHandler.php");

class Signup{
  var $user;
  var $db;
  function __construct()
  {
    $this->db = new DBHandler;
    $this->user = new User;
  }
  function createUser()
  {
    $fr = fopen("php://stdin","r");
    $fw =fopen("php://stdout" , "w");
    // Enter your name

    fprintf($fw,"%s","Enter First Name: ");
    fscanf($fr,"%s",$temp);
    $this->user->setFname($temp);

    // Enter LAst name				

    fprintf($fw,"%s","Enter Last Name: ");
    fscanf($fr,"%s",$temp);
    $this->user->setLname($temp);

    //enter email
    fprintf($fw,"%s","Enter Email : ");
    fscanf($fr,"%s",$temp);
    $this->user->setEmail($temp);

    //enter password

    fprintf($fw,"%s","Enter Password : ");
    fscanf($fr,"%s",$temp);
    $this->user->setPassword($temp);

    if($this->db->insert($this->user))
    {
      fprintf($fw,"%s","Signup successful\n ");
    }
    else
      fprintf($fw,"%s","Name Already exist try something else"."\n");

    fclose($fr);
    fclose($fw);
  }
}
?>
