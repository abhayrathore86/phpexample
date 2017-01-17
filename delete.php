<?php
include "db.php";
if(isset($_REQUEST['q'])){

$id=$_REQUEST['q'];

$sql="delete from customer where id=$id";
echo $sql;
	if (mysqli_query($link,$sql))
  {
  	echo "<script>alert('1 record deleted');</script>";
  	header("location:insert.php");
  }

  }

?>