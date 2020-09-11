<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./service.css">
    <link rel="stylesheet" href="../style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->
  </head>

  <body>


  <header>
    <h1>
      <a href="../index.php"><img src="../img/logo.png" alt="logo" id="logo" /></a>
    </h1>
    <div style="display: flex; align-items: center;">
      <nav>
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a href="./service.php">services</a></li>
          <li><a href="./about.php">About</a></li>
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


    <div class="services-section">
      <div class="inner-width">
        <h1 class="section-title">Our Services</h1>
        <div class="border"></div>
        <div class="services-container">


          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-code"></i>
            </div>
            <div class="service-title">Web Development</div>
            <div class="service-desc">
            Test4job offers a tests in Web Development languages whitsh gives you more opportunities to learn more             </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-brush"></i>
            </div>
            <div class="service-title">Easy platforme</div>
            <div class="service-desc">
          Test4job is one of the easiest platforms to pass your tests
          </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-object-ungroup"></i>
            </div>
            <div class="service-title">Edit Sections</div>
            <div class="service-desc">
          You can in every second edit your informations in your profile also your profile picture            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-database"></i>
            </div>
            <div class="service-title">Databases</div>
            <div class="service-desc">
            all your test results are saved safely in our database wich allows recruters to access them and select the best candidats            </div>
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
