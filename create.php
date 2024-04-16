<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $description=$_POST['description'];
    $about=$_POST['about'];
    $projects=$_POST['projects'];
    $services=$_POST['services'];

    $sql="INSERT INTO crud (name, description, about, projects, services) VALUES ('$name', '$description', '$about', '$projects', '$services')";


    $result=mysqli_query($con,$sql);
    if($result){
        header('location: read.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="mediaqueries.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Create</title>
</head>
<body>

    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Change my name" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" placeholder="Change your description" name="description">
        </div>
        <div class="mb-3">
            <label class="form-label">About Me</label>
            <input type="text" class="form-control" placeholder="Change my About Me information" name="about">
        </div>
        <div class="mb-3">
            <label class="form-label">Projects</label>
            <input type="text" class="form-control" placeholder="Change my Projects" name="projects">
        </div>
        <div class="mb-3">
            <label class="form-label">Services</label>
            <input type="text" class="form-control" placeholder="Change my Services offered" name="services">
        </div>
        <button class="btn btn-dark my-3" name="submit">Submit</button>
        </form>

    </div>
        



</body>
</html>