<?php 
$conn = mysqli_connect("localhost", "root", "", "chat");
if(!$conn){
    echo "connect" . mysqli_connect_error();
}
?>