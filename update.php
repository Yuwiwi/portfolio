<?php
include 'connect.php';

$buttonText = "Return";
$buttonLink = "admin.php";

// Initialize variables to avoid "Undefined variable" warnings
$name = '';
$description = '';
$about = '';
$about1t = '';
$about1desc = '';
$projects = '';
$services = '';

// Check if updateid is set in the URL
if(isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Fetch existing data from the database
    $sql_select = "SELECT * FROM crud WHERE id=?";
    $stmt_select = mysqli_prepare($con, $sql_select);
    mysqli_stmt_bind_param($stmt_select, "i", $id);
    mysqli_stmt_execute($stmt_select);
    $result_select = mysqli_stmt_get_result($stmt_select);

    if(!$result_select) {
        die("Error fetching data: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result_select);

    // Assign fetched data to variables
    $name = $row['name'];
    $description = $row['description'];
    $about = $row['about'];
    $about1t = $row['about1t'];
    $about1desc = $row['about1desc'];
    $projects = $row['projects'];
    $services = $row['services'];

    // Check if form is submitted
    if(isset($_POST['update'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $about = $_POST['about'];
        $about1t = $_POST['about1t'];
        $about1desc = $_POST['about1desc'];

        // Update data in the database using prepared statement
        $sql_update = "UPDATE crud SET name=?, description=?, about=?, about1t=?, about1desc=? WHERE id=?";
        $stmt_update = mysqli_prepare($con, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "sssssi", $name, $description, $about, $about1t, $about1desc, $id);
        
        // Execute the update statement
        $result_update = mysqli_stmt_execute($stmt_update);

        // Check if update was successful
        if($result_update) {
            header('location: read.php');
            exit(); // Ensure no further code execution after redirect
        } else {
            die("Update failed: " . mysqli_error($con));
        }
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
    <title>Update</title>
<style>

.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.btn {
    padding: 5px 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

.btn.btn-danger {
    background-color: #dc3545;
}

.btn.btn-danger:hover {
    background-color: #bd2130;
}

</style>
</head>
<body>
    
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo isset($description) ? $description : ''; ?>">
            </div>
            <div class="form-group">
                <label for="about">About:</label>
                <input type="text" class="form-control" id="about" name="about" value="<?php echo isset($about) ? $about : ''; ?>">
            </div>
            <div class="mt-5">
                <div class="form-group">
                    <label for="about1t">About 1 title:</label>
                    <input type="text" class="form-control" id="about1t" name="about1t" value="<?php echo isset($about1t) ? $about1t : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="about1desc">About 1 desc:</label>
                    <input type="text" class="form-control" id="about1desc" name="about1desc" value="<?php echo isset($about1desc) ? $about1desc : ''; ?>">
                </div>
                <!-- Repeat similar blocks for About 2 and About 3 if needed -->
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="<?php echo $buttonLink; ?>" class="btn btn-danger"><?php echo $buttonText; ?></a>
        </form>
    </div>

</body>
</html>
