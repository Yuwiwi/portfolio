<?php

$connect = mysqli_connect('localhost', 'cms', 'Chingch0ng', 'portfolio');

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' .mysqli_connect_error());  
}