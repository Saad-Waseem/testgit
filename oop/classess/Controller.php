<?php

include_once ("Signup.php");
include_once("Signin.php");
include_once("Student.php");
include_once("Researcher.php");
include_once("DBHandler.php");
include_once("NewsFeed.php");
class Controller
{
  var $user;
  function displayMenu()
  {
    $choice;
    $fr = fopen("php://stdin","r");
    $fw = fopen("php://stdout" ,"w");
    fprintf($fw,"%s","Enter your action\n");
    fprintf($fw,"%s","1: Signup\n2: Signin\n ");
    fscanf($fr,"%s",$choice);
    switch($choice)
    {
    case 1:
      $this->sign_up();
      break;
    case 2:
      $this->sign_in();
      break;
    }
  }
  function sign_up()
  {
    $choice;
    $temp;
    $sp = new Signup;
    $fr = fopen("php://stdin","r");
    $fw = fopen("php://stdout" ,"w");
    fprintf($fw,"%s","Do you want to Signup as a Student or a Researcher\n");
    fprintf($fw,"%s","1- Student\n2-Researcher\n");

    fprintf($fw,"%s","Enter your choice\n");
    fscanf($fr,"%s",$choice); 
    // for studet 
    if($choice == 1)
    {

      $std = new Student;

      $fr = fopen("php://stdin","r");
      $fw =fopen("php://stdout" , "w");
      // Enter your name

      fprintf($fw,"%s","Enter First Name: ");
      fscanf($fr,"%s",$temp);
      $std->setFname($temp);

      // Enter LAst name        

      fprintf($fw,"%s","Enter Last Name: ");
      fscanf($fr,"%s",$temp);
      $std->setLname($temp);

      //enter email
      fprintf($fw,"%s","Enter Email : ");
      fscanf($fr,"%s",$temp);
      $std->setEmail($temp);

      //enter password

      fprintf($fw,"%s","Enter Password : ");
      fscanf($fr,"%s",$temp);
      $std->setPassword($temp);
      $un ; $ul ; $url;
      fprintf($fw,"%s","Enter University Name: ");
      fscanf($fr,"%s",$un);
      fprintf($fw,"%s","Enter University Location: ");
      fscanf($fr,"%s",$ul);
      fprintf($fw,"%s","Enter University URL: ");
      fscanf($fr,"%s",$url);
      $std->setUni($un,$ul,$url);
      fprintf($fw,"%s","Enter Your interests or press s to skip : ");
      $p="";$arr=array();$i=0;
      while($p!='s')
      {
        fscanf($fr,"%s",$p);
        if($p != 's')
        {
          $arr[$i++] = $p;
        }
      }
      $std->addInterests($arr);
      // passing $std will create A user as student 
      $sp->createUser($std);
      // student ends
    }
    //for teacher
    else if ($choice == 2)
    {

      $r = new Researcher;

      $fr = fopen("php://stdin","r");
      $fw =fopen("php://stdout" , "w");
      // Enter your name

      fprintf($fw,"%s","Enter First Name: ");
      fscanf($fr,"%s",$temp);
      $r->setFname($temp);

      // Enter LAst name        

      fprintf($fw,"%s","Enter Last Name: ");
      fscanf($fr,"%s",$temp);
      $r->setLname($temp);

      //enter email
      fprintf($fw,"%s","Enter Email : ");
      fscanf($fr,"%s",$temp);
      $r->setEmail($temp);

      //enter password

      fprintf($fw,"%s","Enter Password : ");
      fscanf($fr,"%s",$temp);
      $r->setPassword($temp);
      $un ; $ul ; $url;
      fprintf($fw,"%s","Enter University Name: ");
      fscanf($fr,"%s",$un);
      fprintf($fw,"%s","Enter University Location: ");
      fscanf($fr,"%s",$ul);
      fprintf($fw,"%s","Enter University URL: ");
      fscanf($fr,"%s",$url);
      $r->setUni($un,$ul,$url);

      fprintf($fw,"%s","Enter publications or press s to skip : ");
      $p="";$arr=array();$i=0;
      while($p!='s')
      {
        fscanf($fr,"%s",$p);
        if($p != 's')
        {
          $arr[$i++] = $p;
        }

      }

      $r->addPublications($arr);

      $arr = array();$p = "";$i = 0;
      fprintf($fw,"%s","Enter Your interests or press s to skip : ");
      while($p!='s')
      {
        fscanf($fr,"%s",$p);
        if($p != 's')
        {
          $arr[$i++] = $p;
        }
      }
      $r->addInterests($arr);

      // passing $std will create A user as student 
      $sp->createUser($r);
    }// reasearcher ends
    fclose($fr);
    fclose($fw);

  }

  function sign_in()
  {
    $si = new Signin;
    $si->enterCredentials();
    $si->search();

    if($si->getIsloggedin()==true)
    {
    $choice;
    $fr = fopen("php://stdin","r");
    $fw = fopen("php://stdout" ,"w");
    fprintf($fw,"%s","Enter your choice\n");
    fprintf($fw,"%s","1: Add Resarch Paper to your profile\n2:generate feeds\n3: To Follow Someone ");
    fscanf($fr,"%s",$choice);
    switch($choice)
    {
    case 1:
      $this->addResearchPaper($si->getEmail());
      break;
    case 2:
      $this->generateFeeds($si->getEmail());
      break;
    case 3:
      $this->follow($si->getEmail());
      break;
    }
    }
  }
  function addResearchPaper($email )
  {
    $rps = array();
    $fw =fopen("php://stdout" , "w");
    $fr = fopen("php://stdin", "r");
    fprintf($fw,"%s","Enter your research Papers or press s to skip: ");
    $p="";$i=0;
    while($p!='s')
    {
      fscanf($fr,"%s",$p);
      $rps[$i++] = $p;
    }
    $db = new DBHandler;

    $db->insertPapers($email ,"{".implode(";", $rps)."}\n");
    fclose($fr);
    fclose($fw);

  }
  function generateFeeds($email)
  {
    $feeds = new NewsFeed;
    $arr = array();
  $arr =   $feeds->getResearchPapers($email);
    $fw = fopen("php://stdout" , "w");
 //   fprintf($fw , $arr);
   
    for($i = 0 ; $i  < count($arr) ; $i++)
    {
      fprintf($fw , $arr[$i]."\n");
    }
   
  }
  function follow($user_email)
  {  
    $email = "";
  $fw = fopen("php://stdout" , "w");
  $fr = fopen("php://stdin", "r");
 
     fprintf($fw , "Enter the email of the person you want to follow:\t");
 $arr  = array();
   $db = new DBHandler;
   
  $p="";$i=0;
    while($p!='s')
    {
      fscanf($fr,"%s",$p);
   if( $db->search($email)== true && $p != 's')
    {
      $arr[$i++] = $p;
    }

    }
    if(count($arr)>0)
    {
      $db->addFollowing($user_email ,"{".implode(";", $arr)."}\n");
    }
    }
}
$c = new Controller;
$c->displayMenu();

?>
