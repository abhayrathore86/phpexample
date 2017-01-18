<!DOCTYPE html>
<html>
<head>
	<title>Insert Update Delete Demo</title>
</head>
<body>
<center>
<table border="1">
<form method="post">
<tr><td>Product Name:</td>
<td><input type="text" name="pname"></td>
</tr>	
<tr><td>Color:</td>
<td><input type="text" name="pcolor"></td>
</tr>
<tr><td>Price:</td>
<td><input type="number" name="price"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</form>	
</table>
<br/>
</center>

</body>
</html>
<?php
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);
if (isset($_REQUEST['submit'])) {
  $pname=$_REQUEST['pname'];
$color=$_REQUEST['pcolor'];
$price=$_REQUEST['price'];
 $conn=new mysqli("localhost","root","root","mydb");
  $str="insert into product(productName,color,Price) values('$pname','$color','$price')";
  $sql=$conn->query($str);
 echo $str;
  if($sql==true)
 {
   
   $last_id=mysqli_insert_id($conn);
  $arr=array();
  $arr["pid"]=$last_id;
  $arr["pname"]=$pname;
  $arr["price"]=$price;
  $arr["color"]=$color;
  $data_string = json_encode($arr);
  print_r($data_string); 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "http://192.168.200.53/demophp/MainSite/insdata.php");
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl,  CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data_string))); 
  $result = curl_exec($curl);
  echo $result;
echo $result;
  curl_close($curl);
//  header('location:insdata.php');
 // }
}

?>