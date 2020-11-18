<?php
if(isset($_GET['rollno']))
{
    $rollno=$_GET['rollno'];
    $con=mysqli_connect("localhost","root","","myhostel");
    $res=mysqli_query($con,"select rollno from student where rollno='$rollno'");
    if(mysqli_num_rows($res)>0)
    {
        echo "<h6 style='color: orangered'>Student Bill Already Added. Kindly Update Bill Details at '<font style='color: deepskyblue'><u>Get Bill</u></font> ' Option </h6><br>";
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