<?php   
session_start();  
if(isset($_SESSION["sess_user"]) || (isset($_SESSION["sess_company"])))
{  
    header("location:../index.php");  
}  

?>  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Company Sign Up</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="./company.css">

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
	  <p class='dropbtn' id='login'>connect</p>
	  <div class="dropdown-content">
	  <a href="./login.php" id="signup">Login</a>
	  <a href="./signup.php" id="signup">Sign Up</a>
			  </div>
        </ul>
      </nav>
    </div>
</header>
	  <!-------->
    <div class="login-box">
      <div>
       <h2> <img src="../img/logo.png" alt="logo" id="logo" /> </h2>
</div>
  <form method="POST">
    <div class="user-box">
      <input class='input' type="text" name="company_name" autocomplete="off" required>
      <label>Company Name</label>
    </div>
    <div class="user-box">
      <input class='input' type="text" name="company_id" autocomplete="off" required="">
      <label>Company ID</label>
    </div>
    <div style="display: flex; justify-content: center; width: 100%;">
    <input type="submit" name='submit' value="Continue" class='input_field' style="cursor: pointer;">
    </div>
    <?php
if(isset($_POST["submit"]))
{ 
if(!empty($_POST['company_name']) && !empty($_POST['company_id'])) 
{  
    $name=$_POST['company_name'];  
    $id=$_POST['company_id']; 
    
    $conn=mysqli_connect('localhost','root','', 'test4job') ;  
  
    $query=mysqli_query($conn,"SELECT * FROM company_registration WHERE company_name='".$name."' AND company_id='".$id."'");  
    $queryOR=mysqli_query($conn,"SELECT * FROM company_registration WHERE company_name='".$name."' OR company_id='".$id."'");  
	$numrows=mysqli_num_rows($query);  
	$numrowsOR=mysqli_num_rows($queryOR);  

	if($numrows==0 && $numrowsOR==0 && count($_POST)>0) 
	{
		$sqli="INSERT INTO company_registration(company_id,company_name) VALUES('$id','$name')"; 
		$result=mysqli_query($conn,$sqli);  
		if($result){  
			session_start();  
			$_SESSION['sess_company']=$id; 
            echo ("<script LANGUAGE='JavaScript'>
    alert('Succesfully registred');
    window.location.href='../index.php';
	</script>");
	}
	else {  
        $message = "<div style='color: red; font-weight: bold; display: block;
        position: relative; text-align: center'>failure</div>";
        echo  $message;  
	}  
}

elseif ( $numrows==0 && $numrowsOR!==0) 
{
	$message = "<div style='color: red; display: block;
        position: relative; text-align: center'>company name or companyID already exist</div>";
        echo  $message; 
}

else {
	session_start();  
$_SESSION['sess_company']=$id;  
header("Location: ../index.php");  

}
}
}
	?>
 
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
	<footer style="width: 100%;">
		<p>Test4JOB, Copyright &copy; 2020</p>
	</footer>

</body>

</html>