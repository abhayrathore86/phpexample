<?php
$myfile=fopen("input.txt", "w+");
$file2=fopen("file3", "r");
$data=fread($file2, filesize("file3"));
echo fwrite($myfile, $data);
fclose($myfile);
?>
