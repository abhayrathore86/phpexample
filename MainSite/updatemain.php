<?php
include "db.php";
if(isset($_REQUEST['q'])){

	//echo "heii";
	$id=$_REQUEST['q'];
	
	$sql="select * from product where p_id=$id";
	//echo $sql;
	if( !( $selectRes = mysqli_query( $link,$sql ) ) ){
    echo mysql_error();
  }else{

  		if (mysqli_num_rows( $selectRes )!=0) {
	while ($row1 = mysqli_fetch_assoc($selectRes)) {
	echo '<center>';
		echo '<table border="1">';
		echo '<form method="post">';
		echo '<tr><td>Product Name:</td>';
		echo '<td><input type="text" name="pname" value='.$row1['productName'].'></td>';
		echo '</tr>';
		echo '<tr><td>Color:</td>';
		echo '<td><input type="text" name="pcolor" value='.$row1['color'].'></td>';
		echo '</tr>';
		echo '<tr><td>Price:</td>';
		echo '<td><input type="text" name="price" value='.$row1['Price'].'></td>';
		echo '</tr>';
		echo '<tr>';
		echo 	'<td colspan="2"><input type="submit" name="update" value="Upadte"></td>';
		echo '</tr>';
		echo '</form>';
		echo '</table>';
		echo '</center>';
	}
//echo $id;
	if(isset($_REQUEST['update'])) {
	//echo $id.'under';
	//$id=$_REQUEST['id'];
	$pname=$_REQUEST['pname'];
	$color=$_REQUEST['pcolor'];
	$price=$_REQUEST['price'];


$sql1="UPDATE product SET productName='".$pname."',color='".$color."',Price='".$price."' WHERE p_id=$id";
//echo $sql1;
if (mysqli_query($link,$sql1))
  {
  	$arr=array();
  $arr["pid"]=$id;
  $arr["pname"]=$pname;
  $arr["price"]=$price;
  $arr["color"]=$color;
  $data_string = json_encode($arr);
  //print_r($data_string); 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "http://192.168.200.53/demophp/ChildSite/updatechild.php");
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

}
}
}
?>