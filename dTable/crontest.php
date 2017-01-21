<?php 
  

  $pname="cronjobtest";
  $color="cronjobcolor";
  $price=1500;
  include "db.php";
  $str="insert into product(productName,color,Price) values('$pname','$color','$price')";
  $sql=$conn->query($str);
 //echo $str;
  
?>