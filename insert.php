<!DOCTYPE html>
<html>
<head>
	<title>Insert Update Delete Demo</title>
</head>
<body>
<center>
<table border="1">
<form method="post">
<tr><td>Name:</td>
<td><input type="text" name="uname"></td>
</tr>	
<tr><td>Age:</td>
<td><input type="text" name="uage"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</form>	
</table>
<br/>
</center>
<?php
include "db.php";

    $selectSQL = 'select * from customer';
 # Execute the SELECT Query
  if( !( $selectRes = mysqli_query( $link,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    echo '<table border="2">';
  echo  '<tr>';
      echo '<th>Name</th>';
      echo '<th>Age</th>';
      echo '<th>Update</th>';
      echo '<th>Delete</th>';
      
    echo '</tr>';
 
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['name']}</td><td>{$row['age']}</td><td><a href='update.php?q={$row['id']}'>Update</a></td><td><a href='delete.php?q={$row['id']}'>Delete</a></td></tr>\n";
        }
      }
  echo '</table>'; 
  }
  

?>
<?php 
	if(isset($_REQUEST['submit'])) {
			$name=$_REQUEST['uname'];
	$age=$_REQUEST['uage'];

include "db.php";
//$sql="select * from product WHERE productName LIKE '%$re%' OR productImage LIKE '%$re%' OR color LIKE '%$re%' OR size LIKE '%$re%' OR weight LIKE '%$re%' OR Manufacturer LIKE '%$re%' OR Price LIKE '%$re%'";
//$sql="insert into customer('name', 'age') VALUES ('".$name."','".$age."')";
// echo($sql);
//$result = mysqli_query($link,$sql);


$sql="INSERT INTO customer (name, age) VALUES ('$_POST[uname]','$_POST[uage]')";
 
if (mysqli_query($link,$sql))
  {
  	echo "1 record added";
  	$selectSQL = 'select * from customer';
 # Execute the SELECT Query
  if( !( $selectRes = mysqli_query( $link,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
  	echo '<table border="2">';
	echo  '<tr>';
      echo '<th>Name</th>';
      echo '<th>Age</th>';
      echo '<th>Update</th>';
      echo '<th>Delete</th>';
      
    echo '</tr>';
 
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['name']}</td><td>{$row['age']}</td><td><a href='update.php?q={$row['id']}'>Update</a></td><td><a href='delete.php?q={$row['id']}'>Delete</a></td></tr>\n";
        }
      }
	echo '</table>'; 
	}
  }
  else{
  	 die('Error: ' . mysql_error());
  }
	}
?>

</body>
</html>