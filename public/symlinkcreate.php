<?php
//$target = '../storage/app/public';
//$link = '/public/storage';
//echo 'public';die;
//$target = '/home/wonde.local/storage/app/public';
//$link = '/home/wonde.local/public/storage';
$target = '../storage/app/public';
$link = 'public/storage';
//symlink($target, $link);
symlink($target, $link);
?>