<?php
include "db.php";
if(isset($_REQUEST['q'])){

$id=$_REQUEST['q'];

$sql="delete from product where p_id=$id";
//echo $sql;
	if (mysqli_query($link,$sql))
  {
  	  $arr=array();
	  $arr["pid"]=$id;
	  $data_string = json_encode($arr);
	  //print_r($data_string); 
	  $curl = curl_init();
	  curl_setopt($curl, CURLOPT_URL, "http://192.168.200.53/demophp/ChildSite/deletechild.php");
	  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	  curl_setopt($curl, CURLOPT_POST, 1);
	  curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($curl,  CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data_string))); 
	  $result = curl_exec($curl);
	  print_r($result);
	  
	  curl_close($curl);
  }

  }

?>