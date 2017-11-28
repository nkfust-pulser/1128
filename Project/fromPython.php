<?php
$python = "D:\\Python36\\python.exe";
$pythonscript = "C:\\xampp\\htdocs\\Project\\python\\ff3-4.py";

$item = "20171123-1030-david90";
$output = array();
$cmd = ("$python $pythonscript $item");
exec("$cmd",$output);
echo json_encode($output);
?>