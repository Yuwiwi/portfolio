<?php
$con=mysqli_connect('localhost', 'root', '', 'portfolio');

if(!$con){
    die(mysqli_error('Error'+$con));
}

?>