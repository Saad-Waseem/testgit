<?php

include_once("User.php");
include_once("Student.php");
include_once("Researcher.php");
class DBHandler
{
  static $autoID = 0 ;
  public function insert($user)
  {
    //write data to user file with auto incremented ID and return 
    //
    self::$autoID = self::$autoID + 1;

    if(file_exists("/var/www/classes/users.txt"))
    {
      $filehandler = fopen("users.txt",'a');
      fwrite($filehandler,self::$autoID."\t");
      fwrite($filehandler,$user->getFname());
      fwrite($filehandler,$user->getLname());
      fwrite($filehandler,$user->getEmail());
      fwrite($filehandler,$user->getPassword());
      fwrite($filehandler,$user->getUni()->getUniName());
      fwrite($filehandler,$user->getUni()->getLocation());
      fwrite($filehandler,$user->getUni()->getURL());
      if(Get_Class($user) == "Researcher")
      {
        fwrite($filehandler,"[ ".$user->getPublications()."]\t");

      }
      fwrite($filehandler,"{". $user->getInterests()."}\t");
      fwrite($filehandler,Get_Class($user)."\n");
      fclose($filehandler);
      return true;
    }
    return false; 
  }
  public function select($email , $pwd)
  {
    $filehandler = fopen ("/var/www/classes/users.txt", "r" );
    while(!feof($filehandler))
    {
      $line =  fgets($filehandler);
      $arr = explode("\t" , $line);
      for ($i =0 ; $i < count($arr); $i++)
      {
        if(strcmp(trim($email),trim($arr[$i])) == 0 )
          return true;
      }
    }
    return false;
  }
  function insertPapers($email , $papers)
  {
    if(file_exists("/var/www/classes/researchpapers.txt"))
    {
      $filehandler = fopen("researchpapers.txt",'a');
      fwrite($filehandler,$email."\t");
      fwrite($filehandler,$papers);
      fclose($filehandler);
    }
  }

  function selectPapers($email)
  {
    $p="";
    $fw = fopen("php://stdout","w");
    //  fprintf($fw , "Dbhandler select papers");
    if(file_exists("/var/www/classes/researchpapers.txt"))
    {
      $filehandler = fopen("researchpapers.txt",'r');
      while(!feof($filehandler))
      {
        $line =  fgets($filehandler);
        $arr = substr($line, 0 , strpos($line , '{'));

          if(strcmp(trim($email),trim($arr)) == 0 )
          { 
            
            $p =  substr($line,strpos($line,'{'),strpos($line,'}'));    
            $p=substr($p,1,-2);
             return explode(";" , $p);
           // return $p;
          }
        //   fprintf($fw,$p);
      }
    }

    fclose($filehandler);
  }

  function search($email)
  {
    $fw = fopen ("php://stdout", "w");
    $filehandler = fopen ("/var/www/classes/users.txt", "r" );
    while(!feof($filehandler))
    {
      $line =  fgets($filehandler);

      $arr = explode("\t" , $line);
      for ($i =0 ; $i < count($arr); $i++)
      {
        if(strcmp(trim($email),trim($arr[$i])) == 0 )
        {
          return true;
        }
      }
    }
    return false;
 
  }
  function addFollowing($follower , $followed)
  {
    if(file_exists("/var/www/classes/following.txt"))
      
    {
      $filehandler = fopen("following.txt",'a');
      fwrite($filehandler,$follower."\t");
      fwrite($filehandler,$followed."\n");
      fclose($filehandler);
    }
 
  }

}
?>
