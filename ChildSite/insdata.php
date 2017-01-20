<?php

	$data = file_get_contents('php://input');
	$json = json_decode($data);
	
	//var_dump($json);
    $lid=$json->pid;
    $pname=$json->pname;
    $price=$json->price;
    $color=$json->color;
   
     $conn=new mysqli("localhost","root","root","Child_Site");
	  $str="insert into product1(Main_site_id,productName,color,Price) values($lid,'$pname','$color',$price)";
	  //echo $str;
	  $sql=$conn->query($str);
	  if ($sql)
  		{
  			echo "1 record added";
  			//echo "<h2>Main Site Table</h2>";
  			$connMain=new mysqli("localhost","root","root","mydb");
		  	$selectSQL = 'select * from product';
		 # Execute the SELECT Query
		  if( !( $selectRes = $connMain->query($selectSQL) ) ){
		    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
		  }else{
		  	echo '<table align="center"><tr><td>';
		  	echo '<table border="2">';
		  	echo '<caption><h2>Main Site Table</h2></caption>';
			echo  '<tr>';
			echo '<th>pid</th>';
		      echo '<th>productName</th>';
		      echo '<th>color</th>';
		      echo '<th>price</th>';
		      echo '<th>Update</th>';
		      echo '<th>Delete</th>';
		      
		    echo '</tr>';
		 
		      if( mysqli_num_rows( $selectRes )==0 ){
		        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
		      }else{
		        while( $row = mysqli_fetch_assoc( $selectRes ) ){
		          echo "<tr><td>{$row['p_id']}</td><td>{$row['productName']}</td><td>{$row['color']}</td><td>{$row['Price']}</td><td><a href='http://192.168.200.53/demophp/MainSite/updatemain.php?q={$row['p_id']}'>Update</a></td><td><a href='http://192.168.200.53/demophp/MainSite/deletemain.php?q={$row['p_id']}'>Delete</a></td></tr>";
		        }
		      }
			echo '</table>'; 
			echo "</td><td></td><td>";
			}

			//echo "<h2>Child Site Table</h2>";
  			
		  	$selectSQL = 'select * from product1';
		 # Execute the SELECT Query
		  if( !( $selectRes = $conn->query($selectSQL) ) ){
		    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
		  }else{

		  	echo '<table border="2" >';
		  	echo '<caption><h2>Child Site Table</h2></caption>';
			echo  '<tr>';
			echo '<th>Main_site_id</th>';
			echo '<th>pid</th>';
		      echo '<th>productName</th>';
		      echo '<th>color</th>';
		      echo '<th>price</th>';
		      // echo '<th>Update</th>';
		      // echo '<th>Delete</th>';
		      
		    echo '</tr>';
		 
		      if( mysqli_num_rows( $selectRes )==0 ){
		        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
		      }else{
		        while( $row = mysqli_fetch_assoc( $selectRes ) ){
		          echo "<tr><td>{$row['Main_site_id']}</td><td>{$row['p_id']}</td><td>{$row['productName']}</td><td>{$row['color']}</td><td>{$row['Price']}</td></tr>";
		        }
		      }
			echo '</table>'; 
			echo '</td></tr></table>';
			}
  		}
	  //
	  //echo $sql;
	  //return $sql;
?>