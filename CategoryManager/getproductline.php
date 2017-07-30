<?php
   require('db.php');
   if(isset($_GET['product_type_id'])){
     $sql = "SELECT * FROM product_lines
           WHERE product_type_id LIKE '%".$_GET['product_type_id']."%'";
     $result = $conn->query($sql);
     $json = [];
     while($row = $result->fetch_assoc()){
          $json[$row['product_line_id']] = $row['product_line'];
     }
     echo json_encode($json);
   }
?>

<?php
   require('db.php');
   if(isset($_GET['product_line_id'])) {
     $sql = "SELECT * FROM product_series
           WHERE product_line_id LIKE '%".$_GET['product_line_id']."%'";
     $result = $conn->query($sql);
     $json = [];
     while($row = $result->fetch_assoc()){
          $json[$row['product_series_id']] = $row['product_series'];
     }
     echo json_encode($json);
   }
?>
