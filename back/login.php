<?php
$name = $_POST['username'];
$pwd = $_POST['password'];
$dbc=mysqli_connect("120.55.66.210:3306","dzh","laodingLajI122","test");
mysqli_query($dbc,"set names utf8");
$select = ("SELECT * FROM test.user WHERE  username='$name' AND userpwd='$pwd'");
$r=mysqli_query($dbc,$select);
if($row = mysqli_fetch_array($r)){
    session_start();
    $_SESSION['username']=$row['username'];
    $_SESSION['userpwd']=$row['userpwd'];

    header("location: welcome.php");
}
else
{
    echo "<script language=javascript>alert('GG!');history.back();</script>";
}