<?php
include("User.php");

class DBHandler
{
  static $autoID = 0 ;

  public function insert($user)
  {
    if(Get_Class($user)=="User")
    {
      //write data to user file with auto incremented ID and return 
      //
      self::$autoID = self::$autoID + 1;
      $fw =fopen("php://stdout" , "w");
      fclose($fw);
      if(file_exists("users.txt"))
      {
        $filehandler = fopen("users.txt",'a');
        fwrite($filehandler,self::$autoID."\t");
        fwrite($filehandler,$user->getFname());
        fwrite($filehandler,$user->getLname());
        fwrite($filehandler,$user->getEmail());
        fwrite($filehandler,$user->getPassword());
        fclose($filehandler);
        return true;
      }


    }
    return false;
  }
  public function select($email , $pwd)
  {
    $fw =fopen("php://stdout" , "w");
    $filehandler = fopen ("/var/www/users.txt", "r" );
    while(! feof($filehandler))
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
}
?>
