<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
}  

else {
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, 'test4job');
$result = mysqli_query($conn,"SELECT * FROM user_info WHERE username = '".$_SESSION['sess_user']."'");
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
    <link rel="stylesheet" href="profileinfo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="../icons/css/all.css" rel="stylesheet"> <!--load all styles -->

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> -->
 
</head>

<body onload="setup()">
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
    <!--------------------- profile --------------------->
    <div class="profile-container">
        <div id="card">
            <div class="top">
                <div class="profile-menu">
                    <div class="image-container">
                    <?php
                        $getimg = mysqli_query($conn,"SELECT profile_img FROM user_info 
                        WHERE username = '".$_SESSION['sess_user']."'");
                        $rows=mysqli_fetch_array($getimg);
                        $img = $rows['profile_img'];
                        if($img != '') :
                        ?>
                        <img src="<?php echo $img?>"  alt="<?php echo $img ?>">
                        <?php else : ?>
                            <img src="../img/avatar.png"  alt="avatar">
                            <?php endif?>
                        <form action=" " method="POST" enctype="multipart/form-data" id="formid">
                        <label class="custom-file-upload">
                        <input type="file" name='upload' /><i class="fas fa-camera" id='cam_icon'></i></label>
                        <input class='btn' type='submit' name='submit' value='save'></button>
                    </form>
                        <?php 
 
// check for form request method 
if(isset($_POST["submit"])) 
{ 
	// check for uploaded file 
	if(isset($_FILES['upload']) && count($_POST)>0) 
	{            
		// file name, type, size, temporary name 
		$file_name = $_FILES['upload']['name']; 
		$file_type = $_FILES['upload']['type']; 
		$file_tmp_name = $_FILES['upload']['tmp_name']; 
        $file_size = $_FILES['upload']['size']; 
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
		// target directory 
		$target_dir = "../uploads/"; 
        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)==false && $file_ext!= ''){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         }
   
		// uploding file 
		if(empty($errors)) 
		{ 
            $img = "../uploads/".$row['username'].'.'.$file_ext;
            if(file_exists($img)) {
                chmod($img,0755); //Change the file permissions if allowed
                unlink('$img'); //remove the file
            }
            move_uploaded_file($file_tmp_name,$img);

			// query 
			$sql = "UPDATE user_info SET profile_img = '$img'
            WHERE (username = '".$_SESSION['sess_user']."')";  

			$r = mysqli_query($conn,$sql); 
			 
			if($r) 
			{ 
				header("location:profileInfo.php") ;
			} 
			
		} 
		else 
		{  
			echo "File can not be uploaded"; 
		} 
	} 
} ?>
                        <h4 class="name">
                        <?php
                $user = $row['username'];
               echo "$user" ?></h2>
                        <p class="email"> <?php
                $user = $row['email'];
               echo "$user" ?></p>
                    </div>
                    <ul class="ul">
                        <li class="li" id="active">Informations</li>
                        <a href="./profileresult.php"><li class="li" id="noactive">Tests</li></a>
                        <li class="li" id="description">Description </li>
                        <div class="description">  <?php
                $user = $row['description'];
               echo "$user" ?>

                        </div>
                    </ul>
                </div>
                <div style="width: 2px; height: 420px; background: gray; margin-top: 35px;"></div>
                <div class="profile-content">
                    <!-- <div class="pic">
                        <span class="activity">Account ID : </span>
                    </div> -->
                    <div style="display: flex; align-items: center;" class='personal'>
                        <p style="font-weight: bold; color: gray;">Personal Information</p>
                        <div style="width: 230px; height: 1px; background: gray; margin: 5px;"></div>
                    </div>

                    <div>
<div>
                        <?php
                $user = $row['email'];
               echo "<label>".'<span class="label">Email :</span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$user."</label>" ?>
                        </div>

                        <div>
                        <?php
                $user = $row['username'];
               echo "<label>".'<span class="label">Username :</span>&nbsp;&nbsp;
               &nbsp;'.$user."</label>" ?>
                        </div>
                  
                 
                        <div>
                        <?php
                $user = $row['first_name'];
               echo "<label>".'<span class="label">First Name :</span>
               &nbsp;'.$user."</label>" ?>   
               </div>
                        <div>
                        <?php
                $user = $row['last_name'];
               echo "<label>".'<span class="label">Last Name :</span>
               &nbsp;'.$user."</label>" ?>                
                       </div>

                       <div>
                        <?php
                $user = $row['age'];
               echo "<label>".'<span class="label">Age :</span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$user."</label>" ?>                
                       </div>
                    </div>
                    <div>
                    <?php
                $user = $row['adress'];
               echo "<label>".'<span class="label">Adress :</span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$user."</label>" ?>
                    </div>
                    <div">
                        <div>
                        <?php
                $user = $row['city'];
               echo "<label>".'<span class="label">City :</span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$user."</label><br>" ?>
                        </div>

                        <div>
                        <?php
                $user = $row['state'];
               echo "<label>".'<span class="label">State :</span>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$user."</label><br>" ?>
                        </div>
                        <div>
                        <?php
                $user = $row['phone'];
               echo "<label>".'<span class="label">Phone Number :</span>
               &nbsp;'.$user."</label><br>" ?>
                        </div>
                        <div>
                        <?php
                $user = $row['whatssap'];
               echo "<label>".'<span class="label">Whatssap Number :</span>
               &nbsp;'.$user."</label><br>" ?>
                        </div>
                        <div>
                        <?php
                $user = $row['URL'];
               echo "<label>".'<span class="label">Linkdein Url :</span>
               &nbsp;'.$user."</label><br>" ?>
                        </div>
                </div>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <button id="button">
                    <a href="./profile.php" id="edit-profie">
                        <b>Edit profile</b></a>
                </button>
            </div>
        </div>
        <iframe src="<?php echo $row['cv_content'];?>" height="585px" width="380px" style="border-radius: 10px;"></iframe>
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