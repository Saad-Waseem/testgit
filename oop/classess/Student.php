<?php
include_once ("User.php");
include_once ("University.php");

class Student extends User{
  
 var  $uni ;
  function __construct()
  {
    $this->uni = new University;
  }
  function setUni($uname,$ulocation,$url)
  {
    $this->uni->setUniname($uname);
    $this->uni->setlocation($ulocation);
    $this->uni->setURL($url);
  }
  function getUni()
  {
    return $this->uni;
  }
}
?>
