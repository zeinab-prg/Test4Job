<?php   
session_start();  
if(isset($_SESSION["sess_company"])){  
    header("location:../index.php");  
}  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test4Job</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="./login.css">
    <link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->
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
  <a href="./signup.php" id="login">SignUp</a>
</div>
        </ul>
      </nav>
    </div>
  </header>
    <!--------------------- section --------------------->
    <div id="form_wrapper">
        <div id="form_left">
            <img src="../img/login.png" alt="test">
        </div>
       
        <form id="form_right" method="POST" action="">
            <h1 style="color: #fa5914">Sign In / Sign Up</h1>
            <div class="input_container">
                <i class="fas fa-envelope" id='icon'></i>
                <input placeholder="Email / Username" required name="email" id="field_email" class='input_field'>
            </div>
            <div class="input_container">
                <i class="fas fa-lock" id='icon'></i>
                <input placeholder="Password" required type="password" name="pass" id="field_password" class='input_field'>
            </div>
            <input type="submit" value="Login" id='input_submit' name='submit' class='input_field'>
            <span>Forgot <a href="#"> Username / Passwrd ?</a></span><br>
            <span id='create_account'>
                <a href="./signup.php">Create your account ➡ </a>
            </span>

<div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, 'test4job');

$message="";
if(count($_POST)>0) {
    $email=$_POST['email'];  
    $pass=$_POST['pass'];  
    $hashed = hash('sha512', $pass);
	$result = mysqli_query($conn,"SELECT username FROM login WHERE (username='$email' OR email='$email') and password = '$hashed' ");
    $count  = mysqli_num_rows($result);
	if($count==0) {
		 echo "Invalid Username or Password!";
	} else {
    session_start(); 
    $row = mysqli_fetch_array($result); 
    $_SESSION['sess_user']= $row['username'];;  
    /* Redirect browser */  
    header("Location: profileInfo.php");  
	}
}
?>


 </div>
 </form>
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