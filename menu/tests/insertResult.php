<?php
session_start();  
    if(!isset($_SESSION["sess_user"])){  
        header("location:login.php");  
    }  
    else {
      try
      {
        $connection = mysqli_connect('localhost','root', '', 'test4job');
      }
      catch(Exception $e)
      {
        die($e->getMessage());
      }
      
      if(count($_POST)>0) {
        $reslut = mysqli_query($connection,"SELECT username FROM user_info WHERE username = '".$_SESSION['sess_user']."'");
        $username = mysqli_fetch_array($reslut)['username'];
        $count = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM results WHERE username='$username'"));
        if($count==0) {
          mysqli_query($connection,"INSERT INTO results (username, ".$_POST['lang']."result) VALUES ('$username','".$_POST['score']."')");
        } else {
          mysqli_query($connection,"UPDATE results SET ".$_POST['lang']."result = '".$_POST['score']."' WHERE username='$username'");
        }
    }
  }
?>
