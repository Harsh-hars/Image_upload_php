<?php
$conn = mysqli_connect('localhost','root','','imageupload');
if($conn==false){
    die('connection error ' . mysqli_connect_error());
}
?>