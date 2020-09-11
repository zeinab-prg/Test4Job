<?php
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
}  
    try
    {
        $connection = mysqli_connect('localhost','root', '', 'test4job');
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test4Job</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/test.css">
    <link rel="stylesheet" href="../PopUp/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="../../icons/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>

<body>
    <!--------------------- Header --------------------->
    <header>
    <h1>
      <a href="../../index.php"><img src="../../img/logo.png" alt="logo" id="logo" /></a>
    </h1>
    <div style="display: flex; align-items: center;">
      <nav>
        <ul>
        <li><a href="../../index.php">Home</a></li>
          <li><a href="../service.php">services</a></li>
          <li><a href="../about.php">About</a></li>
          <li><a href="../contactUs.php">Contact</a></li>
          <div class="dropdown">
  <i class="fas fa-user fa-lg" class='dropbtn'></i>
  <div class="dropdown-content">
          <a href="../profileInfo.php" id="signup">profile</a>
          <a href="../logout.php" id='signup'>Logout</a>
      </div>
      </div>
        </ul>
      </nav>
    </div>
</header>

    <!--------------------- section --------------------->
    <!-- <button>Click me!</button> -->

    <div style="height: 98vh;">
        <div class="popup-wrapper">
            <div class="popup" >
                <div class="popup-content">
                    <h2>Are you ready?</h2>
                    <ul style="text-align: left; line-height: 23px;">
                        <li>
                            10 multiple choice questions will be asked.
                        </li>
                        <li>
                            After validation, you will access the results page where your total will be calculated.
                        </li>
                        <li>
                            The code exercises focus on the programmation languages.
                        </li>
                        <li>
                            The questions are timed individually (1min). When the question time is done, you cannot get
                            back
                            to
                            the previous question.
                        </li>
                        <li>
                            if you cancel your test you can't retake it until 24 hours has passed.

                        </li>
                    </ul>


                    <p style="font-weight: bold; font-size: 19px; margin-top:22px; margin-bottom: 0;"> GOOD LUCK !</p>
                    <div style="display: flex; align-items: center;
                    justify-content: center;">
                        <a href="../../index.php" class="later">Later</a>
                        <button id="startTest">Start test</button>
                    </div>

                </div>
            </div>
        </div>

        <section id="test">
            <div class="testheader">
                <img src="../../img/html.png" alt="">
                <div>
                    <h3><span id="lang">HTML</span> Test :</h3>
                    <p> The exercises relate to HTML5 tags
                        and the integration of audio and video content, forms...
                    </p>
                </div>
            </div>
            <form action="" id="form">
                <div class="questions">
                    <div class="q0">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 0"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q0" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 0");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q0" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q0" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q0" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q1">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 1"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q1" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 1");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q1" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q1" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q1" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q2">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 2"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q2" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 2");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q2" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q2" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q2" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q3">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 3"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q3" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 3");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q3" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q3" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option" name="q3" value="D">
                            <input type="radio">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q4">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 4"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q4" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 4");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q4" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q4" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q4" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q5">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 5"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q5" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 5");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q5" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q5" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q5" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q6">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 6"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q6" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 6");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q6" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q6" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q6" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q7">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 7"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q7" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 7");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q7" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q7" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q7" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q8">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 8"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q8" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 8");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q8" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q8" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q8" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>

                    <div class="q9">
                        <h1>
                            <?php
                                echo mysqli_fetch_array(mysqli_query($connection,"SELECT question FROM html WHERE  num = 9"))['question'];
                            ?>
                        </h1>
                        <div class="option">
                            <input type="radio" name="q9" value="A">
                            <label>
                                <?php
                                $reslut = mysqli_query($connection,"SELECT choices FROM html WHERE  num = 9");
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q9" value="B">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q9" value="C">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label><br>
                        </div>
                        <div class="option">
                            <input type="radio" name="q9" value="D">
                            <label>
                                <?php
                                echo mysqli_fetch_array($reslut)['choices'];
                            ?>
                            </label> <br>
                        </div>
                    </div>
                </div>
            </form>

            <button id="next">Next question</button>
            <div class="timeDiv">
                <p><b>Question: <span id="numQuestion">1</span>/10 &nbsp;&nbsp; Time left: <span
                            id="timeLeft">01:00</span></b></p>
            </div>
            <div class="scoreDiv">
                <h1>Your score: <span id="userScore">?</span>/10</h1>
            </div>
        </section>

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


    <script src="../PopUp/popup.js"></script>
    <script src="../../js/app.js"></script>

</body>

</html>