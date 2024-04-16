<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Read</title>



    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;

        }
        table th {
            background-color: #f2f2f2;
        }
        table td:last-child {
            text-align: center;
        }
        .btn {
            padding: 5px 12px;
            color: white;
            border: none;
            border-radius: 4px;
            margin: 5px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-primary {
            padding: 5px 15px;
        }

    </style>

</head>
<body>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>About Me</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM crud";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $description = $row['description'];
                $about = $row['about'];
                $projects = $row['projects'];
                $services = $row['services'];
            ?>

            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $about; ?></td>
                <!-- <td><?php echo $projects; ?></td>
                <td><?php echo $services; ?></td> -->
                <td>
                    <a href="update.php?updateid=<?php echo $id; ?>" class="btn btn-primary">Update</a>
                    <a href="delete.php?deleteid=<?php echo $id; ?>" class="btn btn-danger">Remove</a>
                </td>
            </tr>

            <?php } ?>

            </tbody>
        </table>






        <table>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Projects</th>
                    <th>Services</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>

<?php
$sql = "SELECT * FROM crud";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $about = $row['about'];
    $projects = $row['projects'];
    $services = $row['services'];
?>

<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $projects; ?></td>
    <td><?php echo $services; ?></td>
    <td>
        <a href="update.php?updateid=<?php echo $id; ?>" class="btn btn-primary">Update</a>
        <a href="delete.php?deleteid=<?php echo $id; ?>" class="btn btn-danger">Remove</a>
    </td>
</tr>

<?php } ?>

</tbody>
        </table>
    </div>

</body>
</html>
