<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/angular.js"></script>
    <script src="scripts/angular-route.js"></script>
    <script>
        var app=angular.module('HostelApp',['ngRoute']);
        app.config(function ($routeProvider) {
            $routeProvider
                .when('/',{
                    templateUrl : "clerk-home.html"
                })
                .when('/home',{
                    templateUrl : "clerk-home.html"
                })
                .when('/register',{
                    template: "<iframe src='register-student-form.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>"
                })
                .when('/getstudent',{
                    template : "<iframe src='show-students-clerk.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>"
                })
                .when('/addbill',{
                    template : "<iframe src='student-billing-form.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>"
                })
                .when('/getbill',{
                    template : "<iframe src='show-students-bill.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>"
                })
        });
    </script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .navbar {
            overflow: hidden;
            background-image: url("images/banner1.jpg");
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            font-family: "Comic Sans MS";
            color: white;
            text-align: center;
            padding: 14px 40px;
            text-decoration: none;
            background-color: grey;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }


        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: lightslategrey;
            font-family: "Comic Sans MS";
            margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-image: url("images/banner4.jpg");
            color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: white;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            background-color: white;
        }
    </style>
</head>
<body ng-app="HostelApp">
<div class="navbar">
        <span>
            <p style="font-family: 'Agency FB';font-size: 30px;color:whitesmoke; text-align: center;float: left;padding-left:20px;padding-top: 20px"><img src="images/icon-clerk.png" height="28px" width="30px" > Clerk Portal</p>
            <p style="font-family: 'Agency FB';font-size: 30px;color:whitesmoke; text-align: center;padding-right: 20px;padding-top: 20px;padding-bottom: 20px;"> Welcome to Clerk Portal</p>
            <a href="#!home">Home</a>
            <div class="dropdown">
                <button class="dropbtn">Student Details
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#!register">Register Student</a>
                    <a href="#!getstudent">Student Details</a>
                    <a href="#!addbill">Add Student Bill</a>
                    <a href="#!getbill">Show & Update Bill</a>
                </div>
            </div>
            <div align="right" class="div-right" style="text-align: right;font-family: 'Comic Sans MS';" >
                <a href="index.php" style="align-self: right;background-color: limegreen">
                    <span><img src="images/icon-home2.png" height="18px" width="25px"></span>
                    <span>&nbsp;Go to main page</span>
                </a>
                <a href="http://localhost:8080/myhostel/#!/login" style="background-color: orangered">
                    <span><img src="images/icon-logout2.png" height="18px" width="20px" align="center">&nbsp;Logout</span>
                </a>
            </div>
        </span>
</div>
    <ng-view></ng-view>
</body>
</html>
