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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

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
    <!--------------------- profile --------------------->
    <div class="profile-container">
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
                <li class="li" id="active">Informations</li>
                <li class="li" id="active">Tests</li>
                <li class="li" id="description">Description </li>
                <div class="description">
                <?php
                $user = $row['description'];
               echo "$user" ?>
                </div>
            </ul>
        </div>
<div class='separator'></div>
        <div  class="form">
    		<form id="contactform" method="POST" enctype="multipart/form-data"> 
                <p class="contact"><label for="name">First Name</label></p> 
                <?php
                    $user = $row['first_name'] ;
                    if ( $user == '' )
                     {
               echo '<input id="name" name="first_name" placeholder="First name" required="" type="text"> ';}
               else {
                echo '<input id="name" name="first_name" value='."$user".' required=""  type="text">'; 
               } ?>
    			 

                <p class="contact"><label for="name"> Last Name</label></p> 
                <?php
                    $user = $row['last_name'] ;
                    if ( $user == '' )
                     {
               echo '<input id="name" name="last_name" placeholder="Last name" required="" type="text"> ';}
               else {
                echo '<input id="name" name="last_name" value='."$user".' required=""  type="text">'; 
               } ?>

<div style="display: flex; flex-direction: row; justify-content:space-evenly; margin : 10px"> 
                <div style="display: flex; flex-direction: row";>
                    <label>Age</label><br>
                    <select class="select-style" name='age'>
                    <?php

                    $user = $row['age'] ;
                    if ( $user == '0' )
                     {
                        echo "<option value='--' selected> Select your age</option>";}
                        else {
                         echo "<option value=".$user." selected>".$user."</option>"; 
                         } 
               ?>
                    <?php
                        for ($i=16; $i<=50; $i++)
                        {
                            ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
                <div>
                <input type="radio" id="male" name="gender" value="male" checked>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            
        </div>
                </div>
            <p class="contact"><label for="name">Adress</label></p>
                <?php
                    $user = $row['adress'] ;
                    if ( $user == '' )
                     {
               echo "<input placeholder='Adress' id='adress' name='adress' type='text'>";}
               else {
                echo '<input value='.$user.' id="adress" name="adress" type="text">'; 
               } 
            
               ?>

             <div style="display: flex; flex-direction: row; justify-content:space-between; margin-right : 20px">
                <div>
                <p class="contact"><label for="name">City</label></p>
                    <?php
                    $user = $row['city'] ;
                    if ( $user == '' )
                     {
               echo "<input placeholder='City' id='city' name='city'>";}
               else {
                echo '<input value='.$user.' id="city" name="city">'; 
               } 
            
               ?>
                </div>
                <div style=" margin-right: 20px;">
                <p class="contact"><label for="name">State</label></p>
                    <select name='state' class="select-style">
                    <?php
                    $user = $row['state'] ;
                    if ( $user == '' )
                     {
               echo "<option value='' selected> Select your option</option>";}
               else {
                echo "<option value=".$user." selected>".$user."</option>"; 
               } 
               ?>
                        <option value="Maroc">Maroc</option>
                        <option value="france">France</option>
                        <option value="Egypt">Egypt</option>
                        <option value="U.S">U.S</option>

                    </select>
                </div>
            </div>
            <div style="justify-content: center; align-self: center;">
            <p class="contact"><label for="name">Uploid your cv (.pdf)</label></p>
                    <input id="cv" type="file" name='file' accept="application/pdf">
                </div>

                <p class="contact"><label>Description</label></p> 
                <?php
                    $user = $row['description'] ;
                    if ( $user == '' )
                     {
               echo "<textarea  cols='35' id='description-input' name='description'></textarea>";}
               else {
                echo '<textarea cols="35" value='."$user".' id="description-input" name="description"></textarea>'; 
               } ?>

                    <p class="contact"><label>Mobile phone</label></p> 
                    <?php
                    $user = $row['phone'] ;
                    if ( $user == '' )
                     {
               echo '<input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>';}
               else {
                echo '<input id="phone" name="phone" value='."$user".' required type="text">'; 
               } ?>

           
           
            <p class="contact"><label for="phone">Whatsapp Number</label></p> 
            <?php
                    $user = $row['whatssap'] ;
                    if ( $user == '' )
                     {
               echo '<input id="phone" name="whatssap" placeholder="whatsapp number" type="text">';}
               else {
                echo '<input id="phone" name="whatssap" value='."$user".' type="text"> '; 
               } ?>
            

            <p class="contact"><label for="phone">Linkdin URL</label></p> 
            <?php
                    $user = $row['URL'] ;
                    if ( $user == '' )
                     {
               echo '<input id="phone" name="URL" placeholder="URL" type="text">';}
               else {
                echo ' <input id="phone" name="URL" value='."$user".' type="text">
                '; 
               } ?>
           
            <div style="display: flex;
    flex-direction: row;  
    justify-content: space-evenly; align-items: center;" >
                <input type="submit" id="submit" class='buttom' name="submit" value ="Save changes">
                <a id="cancel" name="cancel" href='./profileInfo.php'>Cancel</a>
                </div> 	 
   </form> 
</div>
        </div>
    
    </div>
    <div>
    <?php  
if(isset($_POST["submit"]))
{    
    if(!isset($_POST["gender"]))
    {
        echo'please fill your gender';
    }
    else 
    {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $adress=$_POST['adress'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $description=$_POST['description'];
    $phone=$_POST['phone'];
    $whatssap=$_POST['whatssap'];
    $URL=$_POST['URL'];
   

    $sql="UPDATE user_info
    SET 
        first_name = '$first_name',
        last_name = '$last_name',
        age = '$age',
        gender = ' $gender',
        adress = '$adress',
        city = '$city',
        state = '$state',
        phone = '$phone',
        whatssap = '$whatssap',
        URL = '$URL',
        description = '$description'

    WHERE (username = '".$_SESSION['sess_user']."')";  
    $result = mysqli_query($conn,$sql);

                    if($_FILES['file']['size'] > 0)
                    {
                        $file=$_FILES['file'];
                        $fileName=$_FILES['file']['name'];
                        $tmpName=$_FILES['file']['tmp_name'];
                        $tmp = explode('.', $fileName);
                        $file_ext = end($tmp);
                        // target directory 
                        $target_dir = "../CVs/"; 
                        $extensions= array("pdf");
                        
                        if(in_array($file_ext,$extensions)=== false && $file_ext!= ''){
                            $errors[]="extension not allowed, please choose a pdf file.";
                        }
                        if(empty($errors)) 
                        { 
                        $cv = "../CVs/".$row['username'].'.'.$file_ext;
                        move_uploaded_file($tmpName,$cv);
                
                        $sqli="UPDATE user_info SET  
                         cv_name = '$fileName',
                         cv_content = '$cv'
                         WHERE (username = '".$_SESSION['sess_user']."')";  
                         $resulti = mysqli_query($conn,$sqli);
                            if(!$resulti)
                            echo "<div style='color: red; font-weight: bold; display: block;
                            position: relative; text-align: center'>okey</div>";
                        }
                    }

    if($result)
    echo ("<script LANGUAGE='JavaScript'>
    alert('Succesfully updates profile');
    window.location.href='./profileInfo.php';
    </script>");
    else {  
        $message = "<div style='color: red; font-weight: bold; display: block;
        position: relative; text-align: center'>failure</div>";
        echo  $message;  
    }  
}
}
    ?>
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
 