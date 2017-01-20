<?php 
  include('db.php')
?>

<!DOCTYPE html>
<html>
<head>
  <title>Datatables Demo</title>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('#example').DataTable();
    })
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>
<body>
  <form action="" method="post">
    <tr><td>Product Name:</td>
    <td><input type="text" name="pname" id="pname"></td>
    </tr> 
    <tr><td>Color:</td>
    <td><input type="text" name="pcolor" id="color"></td>
    </tr>
    <tr><td>Price:</td>
    <td><input type="number" name="price" id="price"></td>
    </tr>
    <tr>
      <td colspan="2"><input id="btn_submit" type="submit" name="submit_btn" value="Submit"></td>
    </tr>
  </form>
<?php
  if(isset($_REQUEST['submit_btn'])){
      $name = $_REQUEST['pname'];
      $color = $_REQUEST['pcolor'];
      $number = $_REQUEST['price'];

      $ins = "insert into product(productName,color,Price) values('$name','$color','$number')";
      $ins_query = $conn->query($ins);
      if($ins){
        echo "insert succes";
      }
      else{
        echo "fail to insert";
      }
  }
?>
  <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Color</th>
                <th>Price</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php 
          $sel = "select * from product";
          $sel_query = $conn->query($sel);
          foreach ($sel_query as $value) {
              //print_r($value);
            while( $row = mysqli_fetch_assoc( $sel_query ) ){
              echo "<tr><td>{$row['p_id']}</td><td>{$row['productName']}</td><td>{$row['color']}</td><td>{$row['Price']}</td><td><a href='http://192.168.200.53/demophp/MainSite/updatemain.php?q={$row['p_id']}'>Update</a></td><td><a href='http://192.168.200.53/demophp/MainSite/deletemain.php?q={$row['p_id']}'>Delete</a></td></tr>";
            }

          }
        ?>
        
        </tbody>
    </table>
</body>
</html>

