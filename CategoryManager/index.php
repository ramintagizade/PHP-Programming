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
          <div class="panel-heading">Select Categories </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="title">Product Type</label>
              <select name="type" class="form-control">
                <option value=""> <!-- Select Product Type --> </option>
                <?php
                    require('db.php');
                    $sql = "SELECT * FROM product_types";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row['product_type_id']."'>".$row['product_type']."</option>";
                    }
                ?>
              </select>
            </div>
            <div class="form-group">
               <label for="title">Product Line</label>
               <select name="line" class="form-control" >
                 <option value=""> <!-- Select Product Line --> </option>
               </select>
           </div>
           <div class="form-group">
              <label for="title">Product Series</label>
              <select name="series" class="form-control" >
                <option value=""> <!-- Select Product Series --> </option>
              </select>
          </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
$(document).ready(function(){
  $( "select[name='type']" ).change(function () {
      var product_type_id = $(this).val();
      if(product_type_id) {
        $.ajax({
            url: "getproduct.php",
            dataType: 'Json',
            data: {'product_type_id':product_type_id},
            success: function(data) {
                $('select[name="line"]').html('<option value=""></option>');
                $.each(data, function(key, value) {
                    $('select[name="line"]').append('<option value="'+ key +'">'+ value +'</option>');
                    $('select[name="series"]').html('<option value=""></option>');
                });
            }
        });
      }else{
        $('select[name="line"]').html('<option value=""></option>');
        $('select[name="series"]').html('<option value=""></option>');
      }
  });
  $( "select[name='line']" ).on("change",function () {
      var product_line_id = $(this).val();
      if(product_line_id) {
        $.ajax({
            url: "getproduct.php",
            dataType: 'Json',
            data: {'product_line_id':product_line_id},
            success: function(data) {
                $('select[name="series"]').html('<option value=""></option>');
                $.each(data, function(key, value) {
                    $('select[name="series"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });
      }else{
          $('select[name="series"]').html('<option value=""></option>');
      }
  });
});
</script>
