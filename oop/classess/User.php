<?php
class User {
  var $fname = "";
  var $lname = "";
  var $email= "";
  var $pwd = "";
  var $affiliation="";
  var $alumnus = true;
  var $gender  = "";
  var $interests;
   var $major;
   var $friendList;
   var  $following;
//  var $inbox=new Inbox ;
 //  var $act=new Activity;

   function setFname($fn)
   {
     $this->fname = $fn;  
   }
   function getFname()
   {
     return $this->fname;
   }
   function setLname($ln)
   {
     $this->lname = $ln;
   }
   function getLname()
   {
     return $this->lname;
   }
   function setEmail($em)
   {
     $this->email = $em;
   }
   function getEmail()
   {
     return $this->email;

   }
   function setPassword($pw)
   {
     $this->pwd = $pw;
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
     return gender;
   }
   function setMajor($mj)
   {
     $this->major = $mj;
   }
   function getMajor()
   {
     return $this->major;
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

 $u = new User;
$u->setFname("saad");
$fw =fopen("php://stdout" , "w");
fprintf($fw,"%s",$u->getFname()."\n");
fclose($fw);
?>
