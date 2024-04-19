<?php
include 'connect.php';

$buttonText = "Return";
$buttonLink = "edit-images.php";

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
    $profilee = $row['profilee'];
    $pr1 = $row['pr1'];
    $pr2 = $row['pr2'];
    $pr3 = $row['pr3'];
    $s1 = $row['s1'];
    $s2 = $row['s2'];
    $s3 = $row['s3'];
    $s4 = $row['s4'];
    $s5 = $row['s5'];
    $s6 = $row['s6'];
    $s7 = $row['s7'];
    $s8 = $row['s8'];

    // Check if form is submitted
    if(isset($_POST['update'])) {
        // Function to handle file upload
        function uploadFile($file, $destination) {
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Clean up file name to remove spaces and special characters
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $allowedExtensions = array('jpg', 'jpeg', 'png');

            // Check if the uploaded file has an allowed extension
            if(in_array($fileExtension, $allowedExtensions)) {
                // Upload file to the server
                $uploadFileDir = './New folder/';
                $destPath = $uploadFileDir . $newFileName;
                if(move_uploaded_file($fileTmpPath, $destPath)) {
                    return $newFileName; // Return the new file name if upload is successful
                } else {
                    return false; // Return false if upload failed
                }
            } else {
                return 'Invalid file type. Allowed extensions: jpg, jpeg, png';
            }
        }

        // Check if profile image is uploaded
        if(isset($_FILES['profilee']) && $_FILES['profilee']['error'] === UPLOAD_ERR_OK) {
            $profilee = uploadFile($_FILES['profilee'], './New folder/');
            if($profilee === false) {
                die("Error uploading profile image");
            }
        }

        // Check if project images are uploaded
        foreach(['pr1', 'pr2', 'pr3', 's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8'] as $project) {
            if(isset($_FILES[$project]) && $_FILES[$project]['error'] === UPLOAD_ERR_OK) {
                ${$project} = uploadFile($_FILES[$project], './New folder/');
                if(${$project} === false) {
                    die("Error uploading $project image");
                }
            }
        }

        // Update the database with the new images
        $sql_update = "UPDATE crud SET profilee=?, pr1=?, pr2=?, pr3=?, s1=?, s2=?, s3=?, s4=?, s5=?, s6=?, s7=?, s8=? WHERE id=?";
        $stmt_update = mysqli_prepare($con, $sql_update);

        // Check for errors in preparing the statement
        if (!$stmt_update) {
            die("Error preparing statement: " . mysqli_error($con));
        }

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt_update, "ssssssssssssi", $profilee, $pr1, $pr2, $pr3, $s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $id);

        // Execute the update statement
        $result_update = mysqli_stmt_execute($stmt_update);

        // Check if update was successful
        if ($result_update) {
            header('location: read-img.php');
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

input[type="file"],
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
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Profile:</label>
                <input type="file" class="form-control" name="profilee">
            </div>
            <div class="my-5"><label>Projects Images</label>
            <div class="form-group">
                <label>Project 1</label>
                <input type="file" class="form-control" name="pr1">
            </div>
            <div class="form-group">
                <label>Project 2</label>
                <input type="file" class="form-control" name="pr2">
            </div>
            <div class="form-group">
                <label>Project 3</label>
                <input type="file" class="form-control" name="pr3">
            </div>
            <div class="my-5"><label>Service Images</label>
            <div class="form-group">
                <label>Service 1</label>
                <input type="file" class="form-control" name="s1">
            </div>
            <div class="form-group">
                <label>Service 2</label>
                <input type="file" class="form-control" name="s2">
            </div>
            <div class="form-group">
                <label>Service 3</label>
                <input type="file" class="form-control" name="s3">
            </div>
            <div class="form-group">
                <label>Service 4</label>
                <input type="file" class="form-control" name="s4">
            </div>
            <div class="form-group">
                <label>Service 5</label>
                <input type="file" class="form-control" name="s5">
            </div>
            <div class="form-group">
                <label>Service 6</label>
                <input type="file" class="form-control" name="s6">
            </div>
            <div class="form-group">
                <label>Service 7</label>
                <input type="file" class="form-control" name="s7">
            </div>
            <div class="form-group">
                <label>Service 8</label>
                <input type="file" class="form-control" name="s8">
            </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="<?php echo $buttonLink; ?>" class="btn btn-danger"><?php echo $buttonText; ?></a>
        </form>
    </div>

</body>
</html>
