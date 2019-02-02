<?php
      require 'dbh.inc.php';
      $query='SELECT * FROM car ORDER BY carID ASC'

      $result = mysqli_query($conn, $query)
      if ($result) {
        if(mysqli_num_rows($result)>0)
        while($product = mysqli_fetch_assoc($result)){
          print_r($product);
        }
      }
  ?>
