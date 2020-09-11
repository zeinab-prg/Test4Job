<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test4Job</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="about.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
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
          <li class="active"><a href="./about.php">About</a></li>
          <li><a href="./contactUs.php">Contact</a></li>
          <?php session_start();  
      if(isset($_SESSION["sess_user"])): ?>
<div class="dropdown">
  <i class="fas fa-user fa-lg" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="./profileInfo.php" id="signup">profile</a>
          <a href="./logout.php" id='signup'>Logout</a>
      </div>
      </div>
 <?php elseif (isset($_SESSION["sess_company"])): ?>
  <div class="dropdown">
  <i class="fas fa-user-tie" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="./logout.php" id='signup'>Logout</a>
          </div>
 </div>
          <?php else : ?>
            <div class="dropdown">
  <p class='dropbtn' id='login'>connect</p>
  <div class="dropdown-content">
  <a href="./login.php" id="signup">Login</a>
  <a href="./signup.php" id="signup">Sign Up</a>
          </div>
          </div>
      <?php endif; ?>
        </ul>
      </nav>
      </div>
     
    </div>
  </header>


    <div class="descrip">
        <p>
            When friends encourage each other and make a goal to reach, great things happen.<br>
            Our daily mission is to help people find the right job and companies find the right candidates, in the
            shortest timeframe. <br>
            we are giving you the possibility to take tests to improve your skills, and the recruters to select the best
            of you
        </p>
    </div>
    <div class="team">
        <div class="team-section">

            <h1 class="titre2">
                who are we ?
            </h1>
            <span class="border"></span>

            <div class="ps">
                <a href="#p1"><img src="../img/me.jpg " alt="zeinab"></a>
                <a href="#p2"><img src="../img/hamza.jpg " alt="hamza"></a>
                <a href="#p3"><img src="../img/zineb.jpg" alt="zineb"></a>
            </div>


            <div class="section" id="p1">
                <span class="name">ZINEB Ibnelamyn</span>
                <span class="border"></span>
            </div>

            <div class="section" id="p2">
                <span class="name">Hamza Mihdaf</span>
                <span class="border"></span>
            </div>


            <div class="section" id="p3">
                <span class="name">ZINEB Nidali</span>
                <span class="border"></span>
            </div>
        </div>
    </div>

    <!--------------------- footer --------------------->
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