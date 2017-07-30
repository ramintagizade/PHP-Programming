<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  Category Manager </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <!---nav header --->
    <nav class="navbar navbar-default" style="border-bottom:30px solid #3b5998">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="brand-name" style="color:#3b5998;font-weight:bold;margin-top:-25px;margin-left:60px;">Category Manager</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-menu"   >
                <li id="home" ><a href="http://localhost/Desktop/FormDev" >HOME</a></li>
                <li id="trending" ><a href="http://localhost/Desktop/FormDev/admin" >ADMIN</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div id="main-content">
      <div class="container">
        <div class="panel panel-default">
          <div class=" panel-heading ">
            -Categories- <button type="button" class="btn btn-primary add-category">Add Categories </button>
          </div>
          <div class="panel-body">
            <form class="" method="POST" action="">
              <div class="form-group" id="form-group" >
                <input name="product_type" type="text" class="form-control" placeholder="Product Type"> <br>
                <input name="product_line" type="text" class="form-control" placeholder="Product Line"> <br>
                <input name="product_series" type="text" class="form-control" placeholder="Product Series">
              </div>
              <!-- <input type="text" class="field-name" placeholder="Field name"/>
              <input type="button" class="btn btn-info" onclick="addFields()" value="Add Field"/> -->
              <input type="submit" class="btn btn-success" value="Submit" />
            </form>
          </div>
        </div>
        <?php
          if(isset($_POST['product_type']) && isset($_POST['product_line']) && isset($_POST['product_series'])){
            require('db.php');
            $product_type = $_POST['product_type'];
            $product_line = $_POST['product_line'];
            $product_series = $_POST['product_series'];

            $sql = "INSERT INTO product_types (product_type) SELECT '$product_type' FROM DUAL
                  WHERE NOT EXISTS (SELECT * FROM product_types WHERE product_type='$product_type') LIMIT 1";
            $conn->query($sql);

            $sql = "SELECT product_type_id FROM product_types WHERE product_type='$product_type'";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()){
              $product_type_id = $row['product_type_id'];
            }

            $sql = "INSERT INTO product_lines (product_type_id,product_line) SELECT $product_type_id,'$product_line' FROM DUAL
                  WHERE NOT EXISTS (SELECT * FROM product_lines WHERE product_line='$product_line' AND product_type_id=$product_type_id) LIMIT 1";
            $conn->query($sql);

            $sql = "SELECT product_line_id FROM product_lines WHERE product_line='$product_line' AND product_type_id=$product_type_id";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()){
              $product_line_id = $row['product_line_id'];
            }

            $sql = "INSERT INTO product_series (product_line_id,product_type_id,product_series) SELECT $product_line_id,$product_type_id,'$product_series' FROM DUAL
                  WHERE NOT EXISTS (SELECT * FROM product_series WHERE product_series='$product_series' AND product_type_id=$product_type_id AND product_line_id=$product_line_id) LIMIT 1";
            $conn->query($sql);
          }
        ?>
      </div>
    </div>
  </body>
</html>
<script>
  "use strict";
  var toggle = 1;
  $(".panel-body").hide();

  $(".add-category").on("click",function(){
    toggle = 1- toggle;
    if(!toggle){
      $(".panel-body").show();
    }
    else
      $(".panel-body").hide();
  });
  function addFields(){
    if($(".field-name").val().length>0){
      var name = $(".field-name").val();
      var newDiv = document.createElement('div');
      var selectHTML = "";
      selectHTML='</br><input name="'+name+'" type="text" class="form-control" placeholder="Add field value">';
      newDiv.innerHTML = selectHTML;
      document.getElementById("form-group").appendChild(newDiv);
      $(".field-name").val("");
    }
  }
</script>
