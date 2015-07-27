<?php
class University
{
var $name = "";
var $location = "";
var $URL = "";
  function setUniname($n)
  {
$this->name= $n;
  }
  function setLocation($l)
  {
    $this->location=$l;
  }
  function setURL($url)
  {
    $this->URL=$url;
  }
  function getUniname()
  {
    return $this->name;
  }
  function getLocation()
  {
    return $this->location;

  }
  function getURL()
  {
    return $this->URL;
  }

}
?>
