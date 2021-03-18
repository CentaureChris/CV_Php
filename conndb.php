<?php
$conn = mysqli_connect('localhost','root','root',"bddecf5");
if(!$conn){
    echo"Connection failed!: ".mysqli_connect_error().", ".mysqli_connect_errno();
}
?>