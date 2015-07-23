<?php
include ("User.php");
include ("University.php");
class Student extends User{
  
 var  $uni ;
  function __construct()
  {
    $this->uni = new University;
  }
  function setUni()
  {
    $this->uni->setUniname("GCU");
    $this->uni->setUnilocation("Lahore");
    $this->uni->setURL("www.gcu.edu");
  }
  function getUni()
  {
    return $this->uni;
  }
}
?>
