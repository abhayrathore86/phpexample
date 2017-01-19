<?php
include "db.php";
if(isset($_REQUEST['q'])){

	//echo "heii";
	$id=$_REQUEST['q'];
	
	$sql="select * from customer where id=$id";
	if( !( $selectRes = mysqli_query( $link,$sql ) ) ){
    echo mysql_error();
  }else{
  		if (mysqli_num_rows( $selectRes )!=0) {
	while ($row1 = mysqli_fetch_assoc($selectRes)) {
	echo '<center>';
		echo '<table border="1">';
		echo '<form method="post">';
		echo '<tr><td>Name:</td>';
		echo '<td><input type="text" name="uname" value='.$row1['name'].'></td>';
		echo '</tr>';
		echo '<tr><td>Age:</td>';
		echo '<td><input type="text" name="uage" value='.$row1['age'].'></td>';
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
$sql1="UPDATE customer SET name='".$name."',age='".$age."' WHERE id=$id";
//echo $sql1;
if (mysqli_query($link,$sql1))
  {
  	echo "<script>alert('1 record updated');</script>";
  	header("location:insert.php");
}

}

}
}
}
?>