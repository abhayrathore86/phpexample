<?php 
  $data = json_decode(file_get_contents('php://input'));

  $pname=$data->pname;
  $color=$data ->color;
  $price=$data ->price;
  include "db.php";
  $str="insert into product(productName,color,Price) values('$pname','$color','$price')";
  $sql=$conn->query($str);
 //echo $str;
  if($sql==true)
 {
   echo json_encode("Data inserted successfully");
 }
?>