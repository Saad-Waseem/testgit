<?php
class Signin
{
  var $username;
  var $pwd;
  var $isloggedin ;

  function __construct()
  {
  $username = "";
   $pwd = "";
   $isloggedin = false ;
  }
  function enterCredentials()
  {
      
    $fw =fopen("php://stdout" , "w");
    $fr = fopen("php://stdin", "r");
          fprintf($fw,"%s","Enter Username: ");
          fscanf($fr,"%s",$this->username);    
          fprintf($fw,"%s","Enter password: ");
          fscanf($fr,"%s",$this->pwd);  
          fclose($fr);
          fclose($fw);
  }
  function search()
  {
    $temp = "/var/www/users/" . $this->username . ".txt";
     $fw =fopen("php://stdout" , "w");
   
   fprintf($fw,"%s",$temp."\n");


    if(file_exists($temp))
    {
      $filehandler = fopen($temp,"r");
      while(!feof($filehandler))
      {
        $p = fgets($filehandler, 100000);
          fprintf($fw,"%s",$p."\n");
 
        if($this->pwd===$p )
        {
          fprintf($fw,"%s","successfully Signed in ");
          fclose($fw);
          $this->isloggedin = true;
          break;
        }
       
      }
    }
      if($this->isloggedin== false )
      {
   $fw =fopen("php://stdout" , "w");
          fprintf($fw,"%s","Login failed Either you don't have any accoutnor have enterd wrong information\n ");
   fclose($fw);
   
      }
    }

  }
$signin = new Signin;
$signin->enterCredentials();
$signin->search();
?>
