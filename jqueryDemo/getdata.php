<?php
include 'dbslide.php';
$str="select * from Slider";
$res=$conn->query($str);
$return_array=array();
while ($row = mysqli_fetch_assoc($res)) {
    $return_array[]=$row['imageName'];
}
echo json_encode($return_array);
?>