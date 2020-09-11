<?php   
session_start();  
if(!isset($_SESSION["sess_company"])){  
    header("location:login.php");  
}  
else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, 'test4job');
	$result = mysqli_query($conn,"SELECT * FROM results ");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Candidate List</title>
	<link rel="stylesheet" href="./candidateList.css">
	<link rel="stylesheet" href="../style/style.css">
	<link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->
	<link href="https://fonts.googleapis.com/css2?family=Tomorrow:wght@500&display=swap" rel="stylesheet">

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
  <i class="fas fa-user-tie" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="./logout.php" id='signup'>Logout</a>
          </div>
 </div>
        </ul>
      </nav>
    </div>
</header>



	  <div style="display: flex; flex-direction: column; background: #a2a2a5; padding-top: 20px; margin: 0;">

	  <?php 
$i = 1;
	  while ($row = mysqli_fetch_array($result)) 
	  { 
		 
		$user_result = mysqli_query($conn,"SELECT * FROM user_info WHERE username = '".$row['username']."' ");
		$user_row = mysqli_fetch_array($user_result);
		if( $user_row['profile_img'] == '' ) $img = '../img/avatar.png' ;
		else $img = $user_row['profile_img'];
		if ( $row['htmlresult'] == -1)
    {$htmlscore = '--';}
    else { $htmlscore = ($row['htmlresult']*10)."%" ; };

    if ( $row['sqlresult'] == -1)
    {$sqlscore = '--';}
    else { $sqlscore = ($row['sqlresult']*10)."%"; };

    if ( $row['javascriptresult'] == -1)
    {$javascriptscore = '--';}
    else { $javascriptscore = ($row['javascriptresult']*10)."%"; };

    if ( $row['phpresult'] == -1)
    {$phpscore = '--';}
	else { $phpscore = ($row['phpresult']*10)."%"; };
	
	echo '<div class ="main_container">

	<div class="first_card">
	<img src='."$img".' alt="image" style="width:100px; height: 100px; border-radius: 100%;">
  <h3>'."$user_row[first_name] $user_row[last_name]".'</h3>

	 <p><a id="button" href="./usercard.php?candidate='."$row[username]".'">View Profile</a></p>
  </div>
	
			<div class="container">
		
			<div class="card">
				<h3 style="color: white; text-shadow: 0px 2px 2px #615e5e;">'."$row[username]".'</h3>
			</div>

			<div class="line"></div>
			<div class="card">
				<h3>HTML</h3>
				<p class="Score">'."$htmlscore".'</p>
			</div>
			<div class="line"></div>
			<div class="card">
				<h3>JavaScript</h3>
				<p class="Score">'."$javascriptscore".'</p>
			</div>
			<div class="line"></div>
			<div class="card">
				<h3>PHP</h3>
				<p class="Score">'."$phpscore".'</p>
			</div>
			<div class="line"></div>
			<div class="card">
				<h3>MySQL</h3>
				<p class="Score">'."$sqlscore".'</p>
			</div>
		</div>


	</div>
	'; $i = $i+1; 
	
	 } ?>
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