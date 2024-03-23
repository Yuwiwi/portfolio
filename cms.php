<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="mediaqueries.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Admin</title>
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
                    <i class='bx bxs-dashboard' ></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="cms.php">
                    <i class='bx bxs-book-content'></i>
                    <span class="link-name">Edit Contents</span>
                </a></li>
            </ul>
            
        </div>
    </nav>
    <section class="content1">

        <div class="input-container">
            <label for="cms-input" class="input-label">CMS Input:</label>
            <input type="text" id="cms-input" class="cms-input" placeholder="Enter your content here...">
        </div>
    </section>
    <section class="content2">

        <div class="input-container">
            <label for="cms-input" class="input-label">Profile:</label>
            <input type="text" id="cms-input" class="cms-input" placeholder="Enter your content here...">
        </div>
    </section>





    <script src="script.js"></script>
</body>
</html>