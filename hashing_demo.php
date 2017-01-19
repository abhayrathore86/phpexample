<!DOCTYPE html>
<html>
<body>

<?php
$str = "Hello";
$str2=sha1($str);
echo $str2;

if ($str2 == "f7ff9e8b7bb2e09b70935a5d785e0cc5d9d0abf0")
  {
  echo "<br/>".sha1($str2);
  exit;
  }
?> 

</body>
</html>