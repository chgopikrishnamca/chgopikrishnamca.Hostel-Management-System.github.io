<?php
include("includes/connect.php");
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query=mysqli_query($con, "SELECT username, password, usertype FROM users");

    while($row=mysqli_fetch_array($query)){
        $db_username=$row['username'];
        $db_password=$row['password'];
        $db_usertype=$row['usertype'];
        if($username==$db_username &&  $password==$db_password){
            session_start();
            $_SESSION['username']=$db_username;
            $_SESSION['usertype']=$db_usertype;
            if($_SESSION["usertype"] == 'Admin'){
                header("Location:admin-portal.php");
            }
            if($_SESSION["usertype"] == 'Clerk')    {
                header("Location:clerk-portal.php");
            }
            if($_SESSION["usertype"] == 'Warden'){
                header("Location:warden-portal.php");
            }
            if($_SESSION["usertype"] == 'Student Coordinator'){
                header("Location:st-coorndinator-portal.php");
            }
        }
        else{
            header("Location:invalid.html");
        }
    }
}



?>