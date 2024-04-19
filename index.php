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
$about2t = $row['about2t'];
$about2desc = $row['about2desc'];
$about3t = $row['about3t'];
$about3desc = $row['about3desc'];
$projects = $row['projects'];
$services = $row['services'];
$profilee = $row['profilee'];
$pt1 = $row['pt1'];
$pd1 = $row['pd1'];
$pt2 = $row['pt2'];
$pd2 = $row['pd2'];
$pt3 = $row['pt3'];
$pd3 = $row['pd3'];
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



$profileImagePath = "./New folder/" . $profilee;
$profileImagePath1 = "./New folder/" . $pr1;
$profileImagePath2 = "./New folder/" . $pr2;
$profileImagePath3 = "./New folder/" . $pr3;
$profileImagePaths1 = "./New folder/" . $s1;
$profileImagePaths2 = "./New folder/" . $s2;
$profileImagePaths3 = "./New folder/" . $s3;
$profileImagePaths4 = "./New folder/" . $s4;
$profileImagePaths5 = "./New folder/" . $s5;
$profileImagePaths6 = "./New folder/" . $s6;
$profileImagePaths7 = "./New folder/" . $s7;
$profileImagePaths8 = "./New folder/" . $s8;
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
        <div class="container-home">

  

                  <div class="container">
                    <section id="profile">
                      <div><img class="section__pic-container" src="<?php echo $profileImagePath; ?>" alt="Profile Picture">
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

                    <!-- <p id="cont">
                    As a student Web Designer based in Philippines, I get to combine my love for technology and passion for design. I enjoy using my creativity
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
                          <h3><?php echo $about1t; ?></h3>
                          <!-- <h3>Web Design</h3> -->
                          <p><?php echo $about1desc; ?></p>
                          <!-- <p>Transforming concepts into captivating digital experiences</p> -->
                        </li>
                        <li class="li-we">
                          <h3><?php echo $about2t; ?></h3>
                          <!-- <h3>Graphic Design</h3> -->
                          <p><?php echo $about2desc; ?></p>
                          <!-- <p>Bringing ideas to life through vibrant visuals and compelling storytelling</p> -->
                        </li>
                        <li class="li-we">
                          <h3><?php echo $about3t; ?></h3>
                          <!-- <h3>Digital Marketing</h3> -->
                          <p><?php echo $about3desc; ?></p>
                          <!-- <p>Digital marketing drives online success through promotion</p> -->
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
                      <img src="<?php echo $profileImagePath1; ?>" alt="Image 1">
                      <div class="card-content">
                        <h2><?php echo $pt1; ?></h2>
                        <p><?php echo $pd1; ?></p>
                      </div>
                    </div>
                    <div class="card">
                      <img src="<?php echo $profileImagePath2; ?>" alt="Image 2">
                      <div class="card-content">
                        <h2><?php echo $pt2; ?></h2>
                        <p><?php echo $pd2; ?></p>
                      </div>
                    </div>
                    <div class="card">
                      <img src="<?php echo $profileImagePath3; ?>" alt="Image 3">
                      <div class="card-content">
                        <h2><?php echo $pt3; ?></h2>
                        <p><?php echo $pd3; ?></p>
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
            <img src="<?php echo $profileImagePaths1; ?>" alt="Photoshop">
            <div class="description">#</div>
          </div>
          <div class="circle">
            <img src="<?php echo $profileImagePaths2; ?>" alt="Illustrator">
            <div class="description">#</div>
          </div>
          <div class="circle-lr">
            <img src="<?php echo $profileImagePaths3; ?>" alt="Light room">
            <div class="description">#</div>
          </div>
          <div class="circle-html">
            <img src="<?php echo $profileImagePaths4; ?>" alt="HTML">
            <div class="description">#</div>
          </div>
          <div class="circle-js">
            <img src="<?php echo $profileImagePaths5; ?>" alt="JavaScript">
            <div class="description">#</div>
          </div>
          <div class="circle-css">
            <img src="<?php echo $profileImagePaths6; ?>" alt="CSS">
            <div class="description">#</div>
          </div>
          <div class="circle-web-dev">
            <img src="<?php echo $profileImagePaths7; ?>" alt="Web Development">
            <div class="description">#</div>
          </div>
          <div class="circle">
            <img src="<?php echo $profileImagePaths8; ?>" alt="Bootstrap">
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