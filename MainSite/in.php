<?php
$pname=$_REQUEST['pname'];
$color=$_REQUEST['pcolor'];
$price=$_REQUEST['price'];
 $conn=new mysqli("localhost","root","root","mydb");
 $str="insert into product(productName,color,Price) values('$pname',$color,'$price')";
 $sql=$conn->query($str);
 echo $sql;
 if($sql==true)
{
 	$last_id=mysqli_insert_id($conn);
	$arr=array();
 	$arr["pid"]=$last_id;
	$arr["pname"]=$pname;
	$arr["price"]=$price;
	$arr["color"]=$color;
	$data_string = json_encode($arr);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://localhost/demophp/MainSite/insdata.php");
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,	CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data_string))); 
	$result = curl_exec($curl);
	echo $result;
	var_dump(json_decode($result));
	curl_close($curl);
// 	header('location:insdata.php');
 }
?>