<?php
include 'connect.php';
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



    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #e6e5e5;
        }
        .container-edit {
            max-width: 1100px;
            margin: 20px auto;
            margin-right: 100px;
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

        th {
        background-color: #f2f2f2; /* Background color */
        color: #333; /* Text color */
        font-weight: bold; /* Bold text */
        padding: 30px; /* Padding around content */
        text-align: left; /* Align text to the left */
        border-bottom: 2px solid #ddd; /* Bottom border */
        margin: 120px;
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
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./assets/profile.png" alt="">
            </div>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="edit-content.php">
                    <i class='bx bx-edit-alt'></i>
                    <span class="link-name">Edit Content</span>
                </a></li>
                <li><a href="edit-images.php">
                    <i class='bx bx-image'></i>
                    <span class="link-name">Edit Images</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="index.php">
                    <i class='bx bx-arrow-back'></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <div class="container-edit">
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
                // $projects = $row['projects'];
                // $services = $row['services'];
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
                    <th>About Me 1 Title</th>
                    <th>About Me 1 Description</th>
                    <th>About Me 2 Title</th>
                    <th>About Me 2 Description</th>
                    <th>About Me 3 Title</th>
                    <th>About Me 3 Description</th>
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
    $about1t = $row['about1t'];
    $about1desc = $row['about1desc'];
    $about2t = $row['about2t'];
    $about2desc = $row['about2desc'];
    $about3t = $row['about3t'];
    $about3desc = $row['about3desc'];

    // $projects = $row['projects'];
    // $services = $row['services'];
?>

<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $about1t; ?></td>
    <td><?php echo $about1desc; ?></td>
    <td><?php echo $about2t; ?></td>
    <td><?php echo $about2desc; ?></td>
    <td><?php echo $about3t; ?></td>
    <td><?php echo $about3desc; ?></td>
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
                    <th>Project 1 Title</th>
                    <th>Project 1 Description</th>
                    <th>Project Me 2 Title</th>
                    <th>Project Me 2 Description</th>
                    <th>Project 3 Title</th>
                    <th>Project 3 Description</th>
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

    // $projects = $row['projects'];
    // $services = $row['services'];
?>

<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $pt1; ?></td>
    <td><?php echo $pd1; ?></td>
    <td><?php echo $pt2; ?></td>
    <td><?php echo $pd2; ?></td>
    <td><?php echo $pt3; ?></td>
    <td><?php echo $pd3; ?></td>
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
