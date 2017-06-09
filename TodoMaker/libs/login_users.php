<?php
  if(isset($_POST['register'])){
    include_once('classes/class.ManageUsers.php');
    session_start();
    $users = new ManageUsers();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('GMT');
    $date = date("Y-m-d");
    $time = date("H:i:s");
    if(empty($username) || empty($email) || empty($password) || empty($repassword)){
      $error = "All fields are required";
    }
    else if($password!=$repassword) {
      $error = "Password does not match";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $error = "Email is not valid";
    }
    else {
      $check_availabitliy = $users->GetUserInfo($username);
      if($check_availabitliy==0){
        $register_user = $users->registerUsers($username,$email,$password,$ip_address,$time,$date);
        if($register_user==1){
          $make_sessions = $users->GetUserInfo($username);
          foreach ($make_sessions as $userSessions) {
              $_SESSION['todo_name'] = $userSessions['username'];
              if(isset($_SESSION['todo_name'])){
                header("location: index.php");
              }
          }
        }
      }
      else {
        $error = "Username already exists";
      }
    }
  }
  if(isset($_POST['login'])){
    session_start();
    include_once('classes/class.ManageUsers.php');
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];
    if(empty($username) || empty($password)){
      $error = "All fields are required";
    }
    else {
      $login_users = new ManageUsers();
      $auth_user = $login_users->LoginUsers($username,$password);
      if($auth_user==1){
        $make_sessions = $login_users->GetUserInfo($username);
        foreach ($make_sessions as $userSessions) {
            $_SESSION['todo_name'] = $userSessions['username'];
            if(isset($_SESSION['todo_name'])){
              header("location: index.php");
            }
        }
      }
      else {
        $error =  "Invalid Credentials";
      }
    }
  }
?>
