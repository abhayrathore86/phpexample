<!DOCTYPE html>
<html>
<head>
	<title>Insert Update Delete Demo with AJAX and DATATABLE</title>
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" >

      jQuery(document).ready(function() {
        var otable = jQuery('#social-table1').dataTable({
                  "bFilter": false,
                  "bLengthChange": false,
                  "bSort": true,
                  "paging": true,
                  "iDisplayLength": 10,
                  "bProcessing": true,
                  "bServerSide": true,
                  "info": true,
                  "serverSide": true,
                  "ordering": true,
                  "searching": true,
                  //"scrollY":350,
                  "sAjaxSource": "indata.php",
                  "oLanguage": {
                    "sEmptyTable": "No Review founds in the system.",
                    "sZeroRecords": "No Connected account to display",
                    "sProcessing": "Loading..."
                  },
                  "fnPreDrawCallback": function (oSettings) {
                    //logged_in_or_not();
                    
                  },
                  "fnServerParams": function (aoData) {
                    aoData.push({"name": "get_social_detail", "value": true});
                  }   
            });
      } );
    </script>
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
    echo '<div class="container" id="social-table1" class="tableMerchant">';
    echo '<table border="2" >';
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
  echo '</div>';
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