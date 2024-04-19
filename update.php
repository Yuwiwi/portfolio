<?php
include 'connect.php';

$buttonText = "Return";
$buttonLink = "edit-content.php";

// Initialize variables to avoid "Undefined variable" warnings
$name = $description = $about = $about1t = $about1desc = $about2t = $about2desc = $about3t = $about3desc = 
$pt1 = $pd1 = $pt2 = $pd2 = $pt3 = $pd3 = '';

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
    $about2t = $row['about2t'];
    $about2desc = $row['about2desc'];
    $about3t = $row['about3t'];
    $about3desc = $row['about3desc'];
    $pt1 = $row['pt1'];
    $pd1 = $row['pd1'];
    $pt2 = $row['pt2'];
    $pd2 = $row['pd2'];
    $pt3 = $row['pt3'];
    $pd3 = $row['pd3'];

    // Check if form is submitted
    if(isset($_POST['update'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $about = $_POST['about'];
        $about1t = $_POST['about1t'];
        $about1desc = $_POST['about1desc'];
        $about2t = $_POST['about2t'];
        $about2desc = $_POST['about2desc'];
        $about3t = $_POST['about3t'];
        $about3desc = $_POST['about3desc'];
        $pt1 = $_POST['pt1'];
        $pd1 = $_POST['pd1'];
        $pt2 = $_POST['pt2'];
        $pd2 = $_POST['pd2'];
        $pt3 = $_POST['pt3'];
        $pd3 = $_POST['pd3'];

        // Update data in the database using prepared statement
        $sql_update = "UPDATE crud SET name=?, description=?, about=?, about1t=?, about1desc=?, about2t=?, about2desc=?, about3t=?, about3desc=?, pt1=?, pd1=?, pt2=?, pd2=?, pt3=?, pd3=? WHERE id=?";
        $stmt_update = mysqli_prepare($con, $sql_update);

        // Check for errors in preparing the statement
        if (!$stmt_update) {
            die("Error preparing statement: " . mysqli_error($con));
        }

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt_update, "sssssssssssssssi", $name, $description, $about, $about1t, $about1desc, $about2t, $about2desc, $about3t, $about3desc, $pt1, $pd1, $pt2, $pd2, $pt3, $pd3, $id);

        // Execute the update statement
        $result_update = mysqli_stmt_execute($stmt_update);

        // Check if update was successful
        if ($result_update) {
            header('Location: read.php');
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
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= htmlspecialchars($description) ?>">
            </div>
            <div class="form-group">
                <label for="about">About:</label>
                <input type="text" class="form-control" id="about" name="about" value="<?= htmlspecialchars($about) ?>">
            </div>
            <div class="mt-5"><label>About Me: Service Offer</label>
                <div class="form-group">
                    <label for="about1t">About 1 title</label>
                    <input type="text" class="form-control" id="about1t" name="about1t" value="<?= htmlspecialchars($about1t) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">About 1 Description</label>
                    <input type="text" class="form-control" id="about1desc" name="about1desc" value="<?= htmlspecialchars($about1desc) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">About 2 title</label>
                    <input type="text" class="form-control" id="about2t" name="about2t" value="<?= htmlspecialchars($about2t) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">About 2 Description</label>
                    <input type="text" class="form-control" id="about2desc" name="about2desc" value="<?= htmlspecialchars($about2desc) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">About 3 title</label>
                    <input type="text" class="form-control" id="about3t" name="about3t" value="<?= htmlspecialchars($about3t) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">About 3 Description</label>
                    <input type="text" class="form-control" id="about3desc" name="about3desc" value="<?= htmlspecialchars($about3desc) ?>">
                </div>
                <!-- Additional fields for about1desc, about2t, about2desc, about3t, about3desc go here -->
            </div>


            <div class="mt-5"><label>Project</label>
            <div class="form-group">
                    <label for="about1t">Project 1 title</label>
                    <input type="text" class="form-control" id="pt1" name="pt1" value="<?= htmlspecialchars($pt1) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">Project 1 Description</label>
                    <input type="text" class="form-control" id="pd1" name="pd1" value="<?= htmlspecialchars($pd1) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">Project 2 title</label>
                    <input type="text" class="form-control" id="pt2" name="pt2" value="<?= htmlspecialchars($pt2) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">Project 2 Description</label>
                    <input type="text" class="form-control" id="pd2" name="pd2" value="<?= htmlspecialchars($pd2) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">Project 3 title</label>
                    <input type="text" class="form-control" id="pt3" name="pt3" value="<?= htmlspecialchars($pt3) ?>">
                </div>
                <div class="form-group">
                    <label for="about1t">Project 3 Description</label>
                    <input type="text" class="form-control" id="pd3" name="pd3" value="<?= htmlspecialchars($pd3) ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="<?= $buttonLink ?>" class="btn btn-danger"><?= $buttonText ?></a>
        </form>
    </div>
</body>
</html>
