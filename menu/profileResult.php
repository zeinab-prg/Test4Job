<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
}  

else {
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysqli_connect($servername, $username, $password, 'test4job');
$result = mysqli_query($connection,"SELECT * FROM user_info WHERE username = '".$_SESSION['sess_user']."'");
$row = mysqli_fetch_array($result);
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test4Job</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="profileResult.css">
    <link rel="stylesheet" href="resultsStyle.php">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> -->
 
</head>
<body>
    <!--------------------- Header --------------------->
    <header>
    <h1>
      <a href="../index.php"><img src="../img/logo.png" alt="logo" id="logo" /></a>
    </h1>
    <div style="display: flex; align-items: center;">
      <nav>
        <ul>
        <li><a href="../index.php">Home</a></li>
          <li><a href="./service.php">services</a></li>
          <li><a href="./about.php">About</a></li>
          <li><a href="./contactUs.php">Contact</a></li>
          <div class="dropdown">
  <i class="fas fa-user fa-lg" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="./profileInfo.php" id="signup">profile</a>
          <a href="./logout.php" id='signup'>Logout</a>
      </div>
      </div>
        </ul>
      </nav>
    </div>
</header>

<div class="profile-container">
        <div class="profile-menu">
            <div class="image-container">
                        <?php
                        $getimg = mysqli_query($connection,"SELECT profile_img FROM user_info 
                        WHERE username = '".$_SESSION['sess_user']."'");
                        $rows=mysqli_fetch_array($getimg);
                        $img = $rows['profile_img'];
                        if($img != '') :
                        ?>
                        <img src="<?php echo $img?>"  alt="<?php echo $img ?>">
                        <?php else : ?>
                            <img src="../img/avatar.png"  alt="avatar">
                            <?php endif?>
                <h4 class="name"><?php
                $user = $row['first_name'];
               echo "$user" ?></h2>
                    <p class="email"> <?php
                $user = $row['email'];
               echo "$user" ?></p>
                    <p class="username"><?php
                $user = $row['username'];
               echo "$user" ?></p>
            </div>

            <ul class="ul">
                <a href='profileInfo.php'><li class="li" id="noactive">Informations</li></a>
                <li class="li" id="active">Tests</li>
                <li class="li" id="description">Description </li>
                <div class="description">
                <?php
                $user = $row['description'];
               echo "$user" ?>
                </div>
            </ul>
        </div>

        <div>
        <div class="container">
            
        <div class="card">
            <div class="box">
                <div class="percent">
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>   
                    <div class="number">
                    <?php
                        $reslut = mysqli_query($connection,"SELECT username FROM user_info WHERE username = '".$_SESSION['sess_user']."'");
                        $username = mysqli_fetch_array($reslut)['username'];

                        $reslut = mysqli_query($connection,"SELECT htmlresult FROM results WHERE username = '$username'");
                        $htmlscore = mysqli_fetch_array($reslut)['htmlresult'];
                        if ($htmlscore == -1){
                            echo "<h2>00<span>%</span></h2>";
                        }
                        else
                        echo "<h2>".$htmlscore."0<span>%</span></h2>";
                    ?>
                    </div>
               </div> 
             <h2 class="text">HTML</h2><br>
              <a href="./listlanguage.php" class="newtest button"><span>Test Your Skills again!</span></a>
            </div>
        </div> 
        <div class="card">
            <div class="box">
                <div class="percent">
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>   
                    <div class="number">
                    <?php
                        $reslut = mysqli_query($connection,"SELECT username FROM user_info WHERE username = '".$_SESSION['sess_user']."'");
                        $username = mysqli_fetch_array($reslut)['username'];

                        $reslut = mysqli_query($connection,"SELECT javascriptresult FROM results WHERE username = '$username'");
                        $javascriptscore = mysqli_fetch_array($reslut)['javascriptresult'];
                        if ($javascriptscore == -1){
                            echo "<h2>00<span>%</span></h2>";
                        }
                        else
                        echo "<h2>".$javascriptscore."0<span>%</span></h2>";
                    ?>
                   </div>
               </div> 
             <h2 class="text">JavaScript</h2><br>
             <a href="./listlanguage.php" class="newtest button"><span>Test Your Skills again!</span></a>
            </div>
        </div> 
       
        
        <div class="card">
            <div class="box">
                <div class="percent">
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>   
                    <div class="number">
                    <?php
                        $reslut = mysqli_query($connection,"SELECT username FROM user_info WHERE username = '".$_SESSION['sess_user']."' ");
                        $username = mysqli_fetch_array($reslut)['username'];

                        $reslut = mysqli_query($connection,"SELECT sqlresult FROM results WHERE username = '$username'");
                        $sqlscore = mysqli_fetch_array($reslut)['sqlresult'];
                        if ($sqlscore == -1){
                            echo "<h2>00<span>%</span></h2>";
                        }
                        else
                        echo "<h2>".$sqlscore."0<span>%</span></h2>";
                    ?>
                   </div>
               </div> 
             <h2 class="text">SQL</h2><br>
             <a href="./listlanguage.php" class="newtest button"><span>Test Your Skills again!</span></a>
            </div>
        </div> 
         <div class="card">
            <div class="box">
                <div class="percent">
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>   
                    <div class="number">
                    <?php
                        $reslut = mysqli_query($connection,"SELECT username FROM user_info WHERE username = '".$_SESSION['sess_user']."' ");
                        $username = mysqli_fetch_array($reslut)['username'];

                        $reslut = mysqli_query($connection,"SELECT phpresult FROM results WHERE username = '$username'");
                        $phpscore = mysqli_fetch_array($reslut)['phpresult'];
                        if ($phpscore == -1){
                            echo "<h2>00<span>%</span></h2>";
                        }
                        else
                        echo "<h2>".$phpscore."0<span>%</span></h2>";
                    ?>
                   </div>
               </div> 
             <h2 class="text">PHP</h2><br>
             <a href="./listlanguage.php" class="newtest button"><span>Test Your Skills again!</span></a>
            </div>
        </div>
    </div>  

        </div>
                        </div>

                        <div class="site-footer">          
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Test4Code is an initiative  to help the upcoming programmers with finding a propriate job. 
              test4job focuses on providing the most efficient tests.
               We will help programmers build up concepts in different programming languages that include
                JavaScript, SQL, HTML, CSS, PHP, SQL ...
              Also we give the recuters the possibility to find their wanted condidats </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a >JS</a></li>
              <li><a >HTML</a></li>
              <li><a >PHP</a></li>
              <li><a>SQL</a></li>
            
            </ul>
          </div>
 

          <div class="col-md-4 col-sm-6 col-xs-12">
          <h6>Contact Us</h6>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><img src="https://img.icons8.com/color/40/000000/facebook-new.png"/></a></li>
              <li><a class="twitter" href="#"><img src="https://img.icons8.com/color/39/000000/twitter.png"/></a></li>
              <li><a class="GitHub" href="#"><img src="https://img.icons8.com/color/39/000000/github.png"/></a></li>
              <li><a class="linkedin" href="#"><img src="https://img.icons8.com/color/39/000000/linkedin-circled.png"/></a></li>   
            </ul>
          </div>

      </div>
    <footer>
        <p>Test4JOB, Copyright &copy; 2020</p>
    </footer>
    </body>

</html>