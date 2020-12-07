<?php
include '../model/studentModel.php';
require_once('../model/studentModel.php');

echo $_POST['name'];
echo "<br>";
echo $_POST['studentID'];
echo "<br>";
echo $_POST['age'];
echo "<br>";
echo $_POST['phoneNumber'];
echo "<br>";
echo "Ly1 do :". $_POST['reason'];
echo "<br>";
echo $_POST['img'];
echo "<br>";
echo $_POST['clb'];
echo "<br>";
$studentModel = new StudentModel;
$result = null;
$array = array( 
    "full_name" => $_POST['name'],
    "phone" => $_POST['phoneNumber'],
    "studentCode" => $_POST['studentID'],
    "gmail" => $_POST['gmail'],
    "age" => $_POST['age'],
    "clb" => $_POST['clb'],
    "reason" =>  $_POST['reason'],
    "img" =>  $_POST['img'],
    "sta" => 0, 
);
$result= $studentModel->insertStudent($array);
echo $result;   
?>