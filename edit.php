<?php
$name
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
    <title>Admin</title>
</head>
<body>
    <div class="containe my-5">
        <h2>Edit Content</h2>
        <a class="btn btn-primary" href="" role="button">Edit</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Hew</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $host = "localhost";
                    $dbusername = "root";
                    $dbpassword = "";
                    $dbname = "portfolio";

                    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

                    if($conn->connect_error) {
                        die("Connection failed: ". $conn->connect_error);
                    }

                    $query = "SELECT * FROM admin_user WHERE username='$username' AND password='$password'";
                    $result = $conn->query($query);

                    if (!$result) {
                        die("Invalid query: " . $conn->connect_error);
                    }

                    while($row - $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>Yuri</td>
                            <td>Sinunuc</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="edit.php">Edit</a>
                                <a class="btn btn-danger btn-sm" href="delete.php">Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>



            </tbody>
        </table>
    </div>
</body>
</html>