<?php
// Usage without mysql_list_dbs()
$link = mysql_connect('localhost', 'root', 'root');
$res = mysql_query("SHOW DATABASES");
$return_array=array();
while ($row = mysql_fetch_assoc($res)) {
    $return_array[]=$row['Database'];
}
echo json_encode($return_array);
?>