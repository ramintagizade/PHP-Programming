<?php
  include_once('libs/login_users.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Todo Maker </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $("#show_register").click(function(){
          $(".login_form").hide();
          $(".register_form").show();
          return false;
        });
        $("#show_login").click(function(){
          $(".login_form").show();
          $(".register_form").hide();
          return false;
        });
      });
    </script>
  </head>
  <body>
    <div id="mainWrapper">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">
              Todo Maker
            </a>
          </div>
        </div>
      </nav>
      <div id="content">
        <?php
          if(isset($error)){
            echo '<div class="alert alert-danger">'.$error.'</div>';
          }
        ?>
        <div class="login_form">
          <div id="form">
           <form method="post" action="login.php">
            <h2> Login Here </h2>
            <div class="form_elements">
              <label for="Username"> Username </label> <br>
              <input type="text" name="login_username" id="username" />
            </div> </br>
            <div class="form_elements">
              <label for="Password"> Password </label> <br>
              <input type="password" name="login_password" id="password" />
            </div> </br>
            <div class="form_elements">
              <input type="submit" name="login" id="login" class="btn btn-success" value="Login"/>
            </div>
            <br>
            <a href="#" id="show_register"> Don't have an account? </a>
           </form>
          </div>
        </div>

        <div class="register_form">
        <div id="form">
         <form method="post" action="login.php">
          <h2> Register Here </h2>
          <div class="form_elements">
            <label for="Username"> Username </label> <br>
            <input type="text" name="username" id="username" />
          </div> </br>
          <div class="form_elements">
            <label for="Email"> Email </label> <br>
            <input type="text" name="email" id="email" />
          </div> </br>
          <div class="form_elements">
            <label for="Password"> Password </label> <br>
            <input type="password" name="password" id="password" />
          </div> </br>
          <div class="form_elements">
            <label for="Password"> Re-Password </label> <br>
            <input type="password" name="repassword" id="repassword" />
          </div> </br>
          <div class="form_elements">
            <input type="submit" name="register" id="register" class="btn btn-success" value="Register"/>
          </div>
          <br>
          <a href="#" id="show_login"> Already have an account? </a>
         </form>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
