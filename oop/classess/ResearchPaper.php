<?php
class ResearchPaper{
  var $ttitle;
  var $abstract;
  var $author;
  var $journalName;
  var $ccontent; 
  function __construct()
  {
 $this->ttitle = "  ";
 $this->abstract = "  ";
 $this->author = "  " ;
  $this->journalName = "  ";
  $this->ccontent = "  ";
  }
  function setTitle($t)
  {
    $this->ttitle = $t;
  }
  function gettitle()
  {
    return $this->ttitle;
  }
  function setAbstract($a)
  {
    $this->abstract = $a;
  }
  function getAbstract()
  {
    return $this->abstract;
  }
  function setAuthor($auth)
  {
    $this->author = $auth;
  }
  function getAuthor()
  {
    return $this->author;
  }
  function setCoauthor()
  {

  }  // void setdate()
  function countViews()
  {
//    $this->count++;
  }
  function getViews()
  {
    return $this->views;
  }
  function setJournal($j)
  {
    $this->journal = $j;
  }
  function getJournal()
  {
    return $this->journal;
  }
  // void setLibrary()
  function setContent($path)
  {
    //set path to the file and store it into the file
    $this->ccontent = $path;
  }
  function getContent()
  {
    return $this->ccontent;
  }

  // // show all set values
  // void show()
  // // similalry getters can be defined
  //
  //
  // }
}
?>
