<?php
if(isset($_GET['username']))
{
    $username=$_GET['username'];
    $con=mysqli_connect("localhost","root","","myhostel");
    $res=mysqli_query($con,"select username from users where username='$username'");
    if(mysqli_num_rows($res)>0)
    {
        echo "<h5 style='color: orangered'>User Name Already Exists. Choose Another</h5>";
    }
    else
    {
        echo "";
    }
}
else
{
    exit("Error");
}
?>