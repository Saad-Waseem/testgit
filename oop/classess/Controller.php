<?php

include ("Signup.php");

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
    $sp = new Signup;
    $sp->createUser();
  }
  function sign_in()
  {
    $si = new Signin;
    $si->enterCredentials();
    $si->search();

  }

}
$c = new Controller;
$c->displayMenu();

?>
