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
                    templateUrl : "admin-home.html"
                })
                .when('/home',{
                    templateUrl : "admin-home.html"
                })
                .when('/student',{
                    template : "<iframe src='student-details-warden.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>",
                    controller: "AdminStudentController"
                })
                .when('/register',{
                    template: "<iframe src='register-user-form.html' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>",
                    controller : "RegisterUserController"
                })
                .when('/showusers',{
                    template : "<iframe src='show-users.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>",
                    controller: "UserController"
                })
                .when('/logout',{
                    templateUrl : "login.php",
                    controller: "LoginController"
                })
        });
    </script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("images/background5.jpg");
        }
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

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: grey;
            font-family: "Comic Sans MS";
            margin: 0;
            cursor: pointer;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-image: url("images/banner4.jpg");
            color: white;
        }

        button{
            padding: 10px;
            background-color: lightgrey;
            cursor: pointer;
            height: auto;
        }
        button:hover{
            background-color: cornflowerblue;
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
            padding: 12px 14px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            background-color: white;
        }
        .register-container button {
            background-color: orange;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            font-family: "Comic Sans MS";
        }
                                                                        /* For admin-home.html */
        .admin-home img{
            height : 500px;
            width: 100%;
        }
        .data-position{
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body ng-app="HostelApp" ng-cloak>
    <div class="navbar">
            <p style="font-family: 'Agency FB';font-size: 30px;color:whitesmoke; text-align: center;float: left;padding-left:20px;padding-top: 30px;padding-top: 20px"><img src="images/logo-loginuser.png" height="30px" width="30px" > Admin Portal</p>
            <p style="font-family: 'Agency FB';font-size: 30px;color:whitesmoke; text-align: center;padding-top: 30px;padding-bottom: 20px"> Welcome to Administrator</p>
            <a href="#!home">Home</a>
            <a href="#!student">Student</a>
            <div class="dropdown">
                <button class="dropbtn">User Details
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#!register">Register</a>
                    <a href="#!showusers">Show Users</a>
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
    </div>
    <div>
        <ng-view></ng-view>
    </div>
</body>
</html>
