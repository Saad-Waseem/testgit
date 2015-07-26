<?php
include_once("DBHandler.php");
class NewsFeed
{
  var $user;
  var $actionPerformed;
  var $views;
  var $bookmark;
  var $download;
  var $db;
  function __construct()
  {
    $this->db = new DBHandler;
  }
  function getUser()
  {

  }
  function getResearchPapers($email)
  {
return $this->db->selectPapers($email);
  }
  function getInterests()
  {}
  function show()
  {}
}
?>
