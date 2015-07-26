<?php

Class User {
  var $fname;
	var $lname;
	var $email;
	var $pwd ;
	var $affiliation;
	var $alumnus;
	var $gender ;
	var $interests;
	var $major;
	var $friendList;
	var  $following;
	//  var $inbox=new Inbox ;
	//  var $act=new Activity;

  function __construct()
  {
  $this->fname = "";
  $this->lname = "";
	 $this->email= "";
	 $this->pwd = "";
	 $this->affiliation="";
	 $this->alumnus = true;
	 $this->gender  = "";
	 $this->interests;
   $this->major;
   $this->interests = array();
//	 $this->friendList;
	  $this->following = array() ;	
  }
	function setFname($fn)
	{
		$this->fname = $fn."\t";  
	}
	function getFname()
	{
		return $this->fname;
	}
	function setLname($ln)
	{
		$this->lname = $ln."\t";
	}
	function getLname()
	{
		return $this->lname;
	}
	function setEmail($em)
	{
		$this->email = $em."\t";
	}
	function getEmail()
	{
		return $this->email;

	}
	function setPassword($pw)
	{
		$this->pwd = $pw."\t";
	}
	function getPassword()
	{
		return $this->pwd;
	}
	function setPosition($pos)
	{
		$this->position = $pos;
	}
	function getPosition()
	{
		return $this->position;
	}
	function setGender($g)
	{
		$this->gender = $g;
	}
	function getGender()
	{
		return $this->gender;
	}
	function setMajor($mj)
	{
		$this->major = $mj;
	}
	function getMajor()
	{
		return $this->major;
  }
  function addInterests($arr)
  {
    $this->interests =implode(";", $arr);
  }
  function getInterests()
  {
  return $this->interests;
  }
  function addfollower($f)
  {
$this->following = explode(";" , $f);
  }
  function getfollowers()
  {
    return $this->following;
  }
	function manageFriendlist()
	{

	}
	function manageFollowlist()
	{

	}
	function getAct()
	{
		//return act;
	}

}

?>
