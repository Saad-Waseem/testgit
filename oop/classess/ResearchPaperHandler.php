<?php
include_once("ResearchPaper.php");
include_once("DBHandler.php");
class ResearchPaperHandler
{
  var $paper;
  var $list;
  var $db;
  function __construct()
  {
    $this->paper = new ResearchPaper;
    $this->list = array();
    $this->db = new DBHandler;
  }
  function createPaper()
  {
    $val = "";
     $fw =fopen("php://stdout" , "w");
    $fr = fopen("php://stdin" , "r");
    $fr = fopen("php://stdin", "r");
 do  {
    fprintf($fw,"%s","Enter Research Paper Title: ");
    fscanf($fr ,$val);
    $this->paper->setTitle($val); 
  
     fprintf($fw,"%s","Enter Abstract: ");
    fscanf($fr ,$val);
    $this->paper->setAbstract($val);
    fprintf($fw,"%s","Enter Author : ");
    fscanf($fr ,$val);
    $this->paper->setAuthor($val);
    fprintf($fw,"%s","Enter Journal in which this paper is published : ");
    fscanf($fr ,$val);
    $this->paper->setJournal($val);
   fprintf($fw,"%s","Upload Paper : ");
    fscanf($fr ,$val);
    $this->paper->setContent("paper1.txt");
    $this->addToList($this->paper);
   fprintf($fw,"%s","Enter' a' to add another Research Paper or q to quit: ");
    fscanf($fr ,$val);
    }   while ( $val != 'q');
  
  }
  function addToList($p)
  {
   array_push($this->list , $p);
  }

  function savePapers($email)
  {
    $str = "";
    for($i =0 ; $i < count($p) ; $i++)
    {
      $str ="{". $this->list[$i]->getTitle()."\t".$this->list[$i]->getAbstract()."\t".$this->list[$i]->getAuthor() ."\t".$this->list[$i]->getJournal() ."\t".$this->getContent()."}\n";

      $this->db->insertPaper($email , $str);
   
    }
  }
}
?>
