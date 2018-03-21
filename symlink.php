<?php
//$target = '/storage/app/public';
//$link = '/storage';
echo 'index';
$target = '/home/wonde.local/storage/app/public';
$link = '/home/wonde.local/public/storage';


echo symlink($target, $link);

?>