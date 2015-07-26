<?php
class ResearchPaper{
  var $title;
  var $abstract;
  var $author;
  var $coauthors;
  var  $subject;
  var  $datePublished;
  var $views;
  var $journalName;
  var  $DigitalLibrary;
  var $content; 

  function setTtitle($t)
  {
    $this->title = $t;
  }
  function gettitle()
  {
    return $this->title;
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
  function setCo-author()
  {

  }  // void setdate()
  function countViews()
  {
    $this->count++;
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
    $this->content = $path;
  }
  function getContent()
  {
    return $this->content;
  }

  // // show all set values
  // void show()
  // // similalry getters can be defined
  //
  //
  // }
?>
