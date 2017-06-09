<?php
  include_once('class.database.php');
  class ManageUsers {
    public $link;
    function __construct(){
      $db_connection = new dbConnection();
      $this->link = $db_connection->connect();
      return $this->link;
    }
    function registerUsers($username,$email,$password,$ip_address,$time,$date){
      $query = $this->link->prepare("INSERT INTO users (username,email,password,ip_address,reg_date,reg_time) VALUES (?,?,?,?,?,?)");
      $values = array($username,$email,$password,$ip_address,$date,$time);
      $query->execute($values);
      $counts = $query->rowCount();
      var_dump($this->link);
      return $counts;
    }
    function LoginUsers($username,$password){
      $query = $this->link->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
      $rowCount = $query->rowCount();
      return $rowCount;
    }
    function GetUserInfo($username){
      $query = $this->link->query("SELECT * FROM users WHERE username='$username'");
      $rowCount = $query->rowCount();
      if($rowCount==1){
        $result = $query->fetchAll();
        return $result;
      }
      else {
        return $rowCount;
      }
    }
  }
  //$users = new ManageUsers();
  //echo $users->registerUsers('bob','bob','127.0.0.1','13:00','07-06-2017');
 ?>
