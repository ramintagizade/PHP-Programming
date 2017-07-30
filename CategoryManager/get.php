<?php
   require('db.php');
   $sql = "SELECT * FROM product_lines
         WHERE product_type_id LIKE '%".$_GET['product_type_id']."%'";
   $result = $conn->query($sql);
   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['product_line_id']] = $row['product_line'];
   }
   echo json_encode($json);
?>
