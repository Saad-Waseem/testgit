<?php
class dbhandler
{
  var  $servername = "localhost";
  var  $username = "root";
  var   $password = "saad";
  var $conn;
  function connect()
  {
    try{
      $this->conn = new PDO("mysql:host=$this->servername;dbname=firstDB", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully"; 
    }
    catch(PDOException $e)
    {
      echo "connection Failed";
    }
  }
  function iinsert()
  {
    $query = "insert into user (email,fname,lname,type) values ('saad@gmailcom','saad','waseem','student')";
    $this->conn->exec($query);
    echo "New record inserted";
  }
  function select()
  {
    $query = "select * from user";
    $stmt = $this->conn->query($query);
    $row = $stmt->fetchObject();
    echo $row->email;
    echo $row->fname;
    echo $row->lname;
  }
  function delete()
  {
    $query = "delete from user where lname = 'waseem' ";
    $this->conn->exec($query);
  }
  function update()
  {
    $query = "update user set fname = 'shah' where fname = 'saad'";
    $this->conn->exec($query);
  }
}
$db = new DBhandler;
$db->connect();
$db->iinsert();
//$db->select();
//$db->delete();
$db->update();
?>
