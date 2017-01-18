<?php

	$data = file_get_contents('php://input');
	$json = json_decode($data);
	
	var_dump($json);
    $lid=$json->pid;
    $pname=$json->pname;
    $price=$json->price;
    $color=$json->color;
   
     $conn=new mysqli("localhost","root","root","Child_Site");
	  $str="insert into product1(Main_site_id,priceproductName,color,Price) values($lid,'$pname','$color',$price)";
	  $sql=$conn->query($str);
	  return $sql;
?>