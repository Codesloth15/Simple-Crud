<?php 
function connection(){
global $connection;
$connection = mysqli_connect("localhost",'root','','student');
}

?>  