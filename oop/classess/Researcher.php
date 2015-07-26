<?php
include_once ("User.php");
include_once ("University.php");

class Researcher extends User{

  var  $uni ;
  var $pubs;
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

function addPublications($p)
{
$this->pubs = implode("," , $p);
}
function getPublications()
{
  return $this->pubs;
}

}

?>
