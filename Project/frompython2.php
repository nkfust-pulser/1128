<?php
$python = "D:\\Python36\\python.exe";
$pythonscript = "C:\\xampp\\htdocs\\Project\\python\\ff3-4.py";


$cmd = "$python $pythonscript";
(exec("$cmd" , $output));
echo json_encode($output);
?>