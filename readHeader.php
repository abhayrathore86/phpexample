<?php
$url = 'http://192.168.200.53/demo1/example2.html';

print_r(get_headers($url));
print_r("<br/>");
print_r(get_headers($url, 1));
?>