<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Test4Job</title>
  <link rel="stylesheet" href="./style/style.css" />
  <link href="./icons/css/all.css" rel="stylesheet"> <!--load all styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet" />
</head>

<body>
  <!--------------------- Header --------------------->
  
  <header>
    <h1>
      <a href="./index.php"><img src="./img/logo.png" alt="logo" id="logo" /></a>
    </h1>
    <div style="display: flex; align-items: center;">
      <nav>
        <ul>
          <li class="active"><a href="">Home</a></li>
          <li><a href="./menu/service.php">services</a></li>
          <li><a href="./menu/about.php">About</a></li>
          <li><a href="./menu/contactUs.php">Contact</a></li>
          <?php session_start();  
      if(isset($_SESSION["sess_user"])): ?>
<div class="dropdown">
  <i class="fas fa-user fa-lg" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="./menu/profileInfo.php" id="signup">profile</a>
          <a href="./menu/logout.php" id='signup'>Logout</a>
      </div>
      </div>
 <?php elseif (isset($_SESSION["sess_company"])): ?>
  <div class="dropdown">
  <i class="fas fa-user-tie" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="./menu/logout.php" id='signup'>Logout</a>
          </div>
 </div>
          <?php else : ?>
            <div class="dropdown">
  <p class='dropbtn' id='login'>connect</p>
  <div class="dropdown-content">
  <a href="./menu/login.php" id="signup">Login</a>
  <a href="./menu/signup.php" id="signup">Sign Up</a>
          </div>
          </div>
      <?php endif; ?>
        </ul>
      </nav>
      </div>
     
    </div>
  </header>

  
  <!--------------------- section --------------------->
  <section>
    <img src="./img/bg.jpg" alt="" id="bglanding" />
    <div id="landing">
      <h2 id="text">
        VALUE YOUR SKILLS <br />
        &nbsp;&nbsp;THE SMART WAY
      </h2>
      <div>

      <?php if(isset($_SESSION["sess_user"])): ?>
       
        <a href="./menu/listlanguage.php" class="candidate button"><span>Test Your Skills!</span></a>
        <?php endif; ?>

        <?php if(!isset($_SESSION["sess_user"]) && !isset($_SESSION["sess_company"])): ?>
          <a href="./menu/listlanguage.php" class="candidate button"><span>Test Your Skills!</span></a>
          <a href="./menu/companySignUp.php" class="company button"><span>Are You a Company?</span></a>
        <?php endif; ?>

        <?php if(isset($_SESSION["sess_company"])): ?>
        <a href="./menu/candidatelist.php" class="company button"><span>View Test Results?</span></a>
        <?php endif; ?>

      </div>
    </div>
  </section>
  <main id="test">
    <h1>Supported languages:</h1>
    <div style="width: 100px; height: 8px; background: #3c61b9; margin: 20px;"></div>
    <div class="container">
      <div class="lang"><img src="./img/html.png" alt="html5" /></div>
      <div class="lang">
        <img src="./img/css.png" alt="css3" style="width: 80%;" />
      </div>
      <div class="lang">
        <img src="./img/js.png" alt="js" style="height:216px" />
      </div>
      <div class="lang">
        <img src="./img/php.png" alt="js" style="width: 85%; margin: 35px 0;
                height: 150px;" />
      </div>

      <div class="lang">
        <img src="./img/sql.png" alt="js" style="height:190px" />
      </div>
      <div class="lang"><img src="./img/java.png" alt="html5" /></div>
      <div class="lang">
        <img src="./img/terminal.png" alt="html5" style="width: 163px; height: 180px; margin: 25px 0;" />
      </div>

      <div class="lang">
        <img src="./img/python.png" alt="" style="width: 155px; height: 155px; margin: 25px 0;" />
      </div>
    </div>
  </main>
   <!-- Site footer -->
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