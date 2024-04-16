<?php
include 'connect.php'; // Include your database connection script

// Fetch data from the database
$sql_select = "SELECT * FROM crud WHERE id=1"; // Assuming the ID for the data you want to display is 1
$result_select = mysqli_query($con, $sql_select);

if (!$result_select) {
    die("Error fetching data: " . mysqli_error($con));
}

// Fetch the row
$row = mysqli_fetch_assoc($result_select);

// Assign fetched data to variables
$name = $row['name'];
$description = $row['description'];
$about = $row['about'];
$about1t = $row['about1t'];
$about1desc = $row['about1desc'];
$projects = $row['projects'];
$services = $row['services'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>



    <section class="sec-01">
        <div class="container">

            <div class="content">
                <section id="profile">
                    <!-- PUT MY PROFILE PICTURE HERE LATER IN ASSETS FOLDER -->
                    <div class="section__pic-container"><img src="./assets/profile.png" alt="Yuri's Profile Picture">
                    </div>

                        <div class="home">
                            <div class="home-text">
                                <span>Frontend Developer</span>
                                <h1><?php echo $name; ?></h1>
                                <!-- <p>Sleek, dynamic front-end solutions designed to captivate users, elevate brand presence, and fuel conversions with seamless functionality.</p> -->
                                <p><?php echo $description; ?></p>
                                <div class="btn-container">

                                    <div id="socials-container">
                                        <img src="./assets/facebook-logo-24.png" alt="My Facebook Profile" class="icon" onclick="location.href='https://www.facebook.com/zyuwiwi/'">
                                        <img src="./assets/github-logo-24.png" alt="My Github Profile" class="icon" onclick="location.href='https://github.com/Yuwiwi/'">
                                        <button class="btn btn-color-1" onclick="location.href='contact.html'">Hire Me</button>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </section>

    <!----------- PAGE 2 ----------->
    <section class="sec-02">
        <div class="container">
            <h3 class="section-title-2">ABOUT ME</h3>
            <div class="content-2">
                <div class="info">

                    <!-- <p id="cont">As a student Web Designer based in Philippines, I get to combine my love for technology and passion for design. I enjoy using my creativity
                      skills to create a digital experience for users. 
                      <br>
                      <br>
                      I believe that crafting digital experiences that captivate, inspire, and resonate with users worldwide. Every line of code, every color choice, and every interaction meticulously designed to transform ideas into beautiful realities on the web.
                      <br>
                      <br>
                      Feel free to grab my resume for a closer look at my profile.
                    </p> -->
                    <p id="cont"><?php echo $about; ?>
                    </p>


                    <button id="downloadBtn" class="btn btn-color-2">My Resume</button>
                

                    
                    <div class="container-cards">
                      <ul>
                        <li class="li-we">
                          <!-- <h3>Web Design</h3> -->
                          <h3><?php echo $about1t; ?></h3> 
                          <p><?php echo $about1desc; ?></p>
                          <!-- <p>Transforming concepts into captivating digital experiences</p> -->
                        </li>
                        <li class="li-we">
                          <h3>Graphic Design</h3>
                          <p>Bringing ideas to life through vibrant visuals and compelling storytelling</p>
                        </li>
                        <li class="li-we">
                          <h3>Digital Marketing</h3>
                          <p>Digital marketing drives online success through promotion</p>
                        </li>
                      </ul>
                    </div>

                </div>
            </div>



        </div>
        <div class="container">
            <h3 class="section-title">PROJECTS</h3>

            <div class="container">
                <div class="scrollable-container">
                  <div class="card-container">
                    <div class="card">
                      <img src="./assets/The Healthiest Social Pages.jpg" alt="Image 1">
                      <div class="card-content">
                        <h2>Facebook, Twitter, and Pinterest</h2>
                        <p>I obviously created these softwares! Trust me bro</p>
                      </div>
                    </div>
                    <div class="card">
                      <img src="./assets/samurai.jpg" alt="Image 2">
                      <div class="card-content">
                        <h2>Washing! Shing!</h2>
                        <p>hehe</p>
                      </div>
                    </div>
                    <div class="card">
                      <img src="./assets/cat.jpg" alt="Image 3">
                      <div class="card-content">
                        <h2>Catto!</h2>
                        <p>Gattito gattito! purr</p>
                      </div>
                    </div>
                    <div class="card">
                      <img src="./assets/bolt.jpg" alt="Image 4">
                      <div class="card-content">
                        <h2>WOWOWO</h2>
                        <p>heheheheh</p>
                      </div>
                    </div>
                    <!-- Add more cards as needed -->
                  </div>
                </div>
            </div>



        </div>
    </section>
    <section class="sec-03">
      <div class="container">
        <h3 class="section-title-3">SERVICES</h3>


        <div class="circle-grid">
          <div class="circle">
            <img src="assets/ps.jpg" alt="Photoshop">
            <div class="description">#</div>
          </div>
          <div class="circle">
            <img src="assets/ai.jpg" alt="Illustrator">
            <div class="description">#</div>
          </div>
          <div class="circle-lr">
            <img src="assets/lr.jpg" alt="Light room">
            <div class="description">#</div>
          </div>
          <div class="circle-html">
            <img src="assets/html.jpg" alt="HTML">
            <div class="description">#</div>
          </div>
          <div class="circle-js">
            <img src="assets/javas.jpg" alt="JavaScript">
            <div class="description">#</div>
          </div>
          <div class="circle-css">
            <img src="assets/CSS.jpg" alt="CSS">
            <div class="description">#</div>
          </div>
          <div class="circle-web-dev">
            <img src="assets/webdev.jpg" alt="Web Development">
            <div class="description">#</div>
          </div>
          <div class="circle">
            <img src="assets/bootstrap.jpg" alt="Bootstrap">
            <div class="description">#</div>
          </div>
        </div>



      </div>
    </section>
    <section class="bottom-cont">
      <div id="socials-container-bottom">
        <img src="./assets/facebook-logo-24.png" alt="My Facebook Profile" class="icon" onclick="location.href='https://www.facebook.com/zyuwiwi/'">
        <img src="./assets/instagram.png" alt="My Instagram Profile" class="icon" onclick="location.href='https://www.instagram.com/zyuwiwi/'">
        <img src="./assets/github-logo-24.png" alt="My Github Profile" class="icon" onclick="location.href='https://github.com/Yuwiwi/'">
      </div>
      <div id="txt-bottom">
      
        <h3 class="bottom-txt">
          <span onclick="location.href='login.php'">Yuri</span> Rubio
        </h3>
      </div>
      
    </section>





    <script src="script.js"></script>
</body>
</html>