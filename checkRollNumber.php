<?php
if(isset($_GET['rollno']))
{
    $rollno=$_GET['rollno'];
    $con=mysqli_connect("localhost","root","","myhostel");
    $res=mysqli_query($con,"select rollno from student where rollno='$rollno'");
    if(mysqli_num_rows($res)>0)
    {
        echo "<h4 style='color: #fd7e14'>Student Already Exists</h4>";
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