<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact V15</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./contactUs.css">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

    <!--===============================================================================================-->
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
          <li><a href="./service.php">services</a></li>
          <li ><a href="./about.php">About</a></li>
          <li class="active" ><a href="./contactUs.php">Contact</a></li>
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

    <div class="container-contact100">

        <div class="wrap-contact100">
            <div class="contact100-form-title" style="background-image: url(../img/bg-01.jpg);">
                <span class="contact100-form-title-1">
                    Contact Us
                </span>

                <span class="contact100-form-title-2">
                    Feel free to drop us a line below!
                </span>
            </div>

            <form class="contact100-form validate-form">
                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Full Name:</span>
                    <input class="input100" type="text" name="name" placeholder="Enter full name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="label-input100">Email:</span>
                    <input class="input100" type="text" name="email" placeholder="Enter email addess">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Phone is required">
                    <span class="label-input100">Phone:</span>
                    <input class="input100" type="text" name="phone" placeholder="Enter phone number">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Message is required">
                    <span class="label-input100">Message:</span>
                    <textarea class="input100" name="message" placeholder="Your Comment..."></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        <span>
                            Submit
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!--===============================================================================================-->

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