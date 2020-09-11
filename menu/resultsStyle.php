<?php
    header("Content-type: text/css; charset: UTF-8");
?>
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
    $reslut = mysqli_query($connection,"SELECT username FROM user_info WHERE username = '".$_SESSION['sess_user']."' ");
    $username = mysqli_fetch_array($reslut)['username'];

    $reslut = mysqli_query($connection,"SELECT * FROM results WHERE username = '$username'");
    $row = mysqli_fetch_array($reslut);

   

    if ( $row['htmlresult'] == -1)
    {$htmlscore = 00;}
    else { $htmlscore = $row['htmlresult']*10; };

    if ( $row['sqlresult'] == -1)
    {$sqlscore = 00;}
    else { $sqlscore = $row['sqlresult']*10; };

    if ( $row['javascriptresult'] == -1)
    {$javascriptscore = 0*10;}
    else { $javascriptscore = $row['javascriptresult']*10; };

    if ( $row['phpresult'] == -1)
    {$phpscore = 0*10;}
    else { $phpscore = $row['phpresult']*10; };

?>



.card:nth-child(1) svg circle:nth-child(2)
{
    stroke-dashoffset: calc(440 - (440 * <?php echo $htmlscore; ?>) / 100);
    stroke: #00ff43;
}
.card:nth-child(2) svg circle:nth-child(2)
{
    stroke-dashoffset: calc(440 - (440 * <?php echo $javascriptscore; ?>) / 100);
    stroke: #00a1ff;
}
.card:nth-child(3) svg circle:nth-child(2)
{
    stroke-dashoffset: calc(440 - (440 * <?php echo $sqlscore; ?>) / 100);
    stroke: #ff04f7;
}
.card:nth-child(4) svg circle:nth-child(2)
{
    stroke-dashoffset: calc(440 - (440 * <?php echo $phpscore; ?>) / 100);
    stroke: #d6a10d;
}
