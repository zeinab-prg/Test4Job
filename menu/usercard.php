<?php
    session_start();  
    if(!isset($_SESSION["sess_user"]) && !isset($_SESSION["sess_company"]) ){  
        header("location:../index.php");  
    }  
    try
    {
        $connection = mysqli_connect('localhost','root', '', 'test4job');
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
$candidate = $_GET['candidate'];
    $result = mysqli_query($connection,"SELECT * FROM user_info , results 
    WHERE user_info.username=results.username AND user_info.username = '".$candidate."' ");
    $row = mysqli_fetch_array($result);
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test4Job</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="./usercard.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="../icons/css/all.css" rel="stylesheet">
    <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
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
              <li><a href="./about.php">About</a></li>
              <li><a href="./contactUs.php">Contact</a></li>
              <?php  
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
          <?php endif; ?>
            </ul>
          </nav>
          </div>
         
        </div>
      </header>

    <article class="usercard">
        <div class="usercard__body">
            <header class="usercard__header">
            <?php
                        $img = $row['profile_img'];
                        if($img != '') :
                        ?>
                        <img src="<?php echo $img?>"  alt="<?php echo $img ?>" class="usercard__avatar">
                        <?php else : ?>
                        <img src="../img/avatar.png" class="usercard__avatar"  alt="avatar">
                        <?php endif?>
                <div class="usercard__header-info">
                    <h3 class="usercard__name"><?php echo $row['first_name']?> <span class="usercard__name-label"><?php echo $row['last_name']?></span></h3>
                </div>
            </header>
            <div class="usercard__content">
                <div class="slider">

                    <!-- the control elements of slider -->

                    <input id="slide1" type="radio" class="slider__switch usercard__switch"
                        name="slider-controls" checked autofocus>
                    <label for="slide1" class="slider__control usercard__control"></label>
                    <input id="slide2" type="radio" class="slider__switch usercard__switch"
                        name="slider-controls">
                    <label for="slide2" class="slider__control usercard__control"></label>
                    <input id="slide3" type="radio" class="slider__switch usercard__switch"
                        name="slider-controls">
                    <label for="slide3" class="slider__control usercard__control"></label>

                    <div class="slider__slides">

                        <!-- first slide -->

                        <div class="slider__slide">
                            <h4 class="usercard__title">About me</h4>
                            <div class="usercard__stats">
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/44/000000/europe.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">State</span>
                                        <span class="stats__value"><?php echo $row['state'] ?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/44/000000/worldwide-location.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">Hometown</span>
                                        <span class="stats__value"><?php echo $row['city'] ?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/44/000000/calendar.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">Age</span>
                                        <span class="stats__value"><?php echo $row['age']?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/44/000000/handshake-heart.png"/>
                                <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">Gender</span>
                                        <span class="stats__value"><?php echo $row['gender']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- second slide -->

                        <div class="slider__slide">
                            <h4 class="usercard__title">My Skills</h4>
                            <div class="usercard__stats">
                                <div class="stats usercard__stats-item">
                                <img class='lang_icon' src="https://img.icons8.com/color/50/000000/source-code.png"/>
                                    <div class="stats__info usercard__stats-info">
                                      
                                        <span class="stats__value"><?php echo $htmlscore?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img class='lang_icon' src="https://img.icons8.com/color/50/000000/sql.png"/>
                                <div class="stats__info usercard__stats-info">
                                       
                                        <span class="stats__value"><?php echo $sqlscore?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img class='lang_icon' src="https://img.icons8.com/color/50/000000/php.png"/>
                                    <div class="stats__info usercard__stats-info">
                                       
                                        <span class="stats__value"><?php echo $phpscore?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img class='lang_icon' src="https://img.icons8.com/color/50/000000/javascript.png"/>
                                    <div class="stats__info usercard__stats-info">
                                       
                                        <span class="stats__value"><?php echo $javascriptscore?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- third slide -->

                        <div class="slider__slide">
                            <h4 class="usercard__title">My Contacts</h4>
                            <div class="usercard__stats">
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/48/000000/email.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">E-mail</span>
                                        <a href="#0" class="stats__value"><?php echo $row['email']?></a>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/48/000000/phone.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">Phone</span>
                                        <a href="tel:79000000000" class="stats__value"><?php echo $row['phone']?></a>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/48/000000/whatsapp.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">WhatsApp</span>
                                        <span class="stats__value"><?php echo $row['whatssap']?></span>
                                    </div>
                                </div>
                                <div class="stats usercard__stats-item">
                                <img src="https://img.icons8.com/color/48/000000/linkedin-2.png"/>
                                    <div class="stats__info usercard__stats-info">
                                        <span class="stats__name usercard__stats-name">LinkedIn</span>
                                        <span class="stats__value"><a><?php echo $row['URL']?></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

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