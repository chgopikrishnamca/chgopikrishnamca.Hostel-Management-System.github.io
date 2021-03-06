<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="scripts/angular.js"></script>
    <script src="scripts/angular-route.js"></script>
    <script src="scripts/angular-messages.js"></script>
    <link rel="stylesheet" href="css/contacts.css">
    <link rel="stylesheet" href="css/about.css">
    <title>Hostel Management</title>
    <script>
        var app=angular.module('HostelApp',['ngRoute','ngMessages']);

        app.config(function ($routeProvider) {
            $routeProvider
                .when('/',{
                    template   : "<iframe src='home.html' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>",
                    controller : "RootController"
                })
                .when('/home',{
                    templateUrl: "home.html",
                    controller : "HomeController"
                })
                .when('/about',{
                    templateUrl: "about.html",
                    controller : "AboutController"
                })
                .when('/login',{
                    template: "<iframe src='login.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>",
                })
                .when('/student',{
                    template: "<iframe src='student.php' width='100%' height='auto' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:auto;width:100%;border:none;overflow:hidden;'></iframe>",
                    controller : "StudentController"
                })
                .when('/gallery',{
                    template   : "<iframe src='gallery.html' width='auto' height='720' scrolling='yes' frameborder='0'  onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+\"px\";}(this));' style='height:100%;width:100%;border:none;overflow:hidden;'></iframe>",
                    controller : "GalleryController"
                })
                .when('/contact',{
                    templateUrl: "contacts.html",
                    controller : "ContactsController"
                });
        });
    </script>
    <style>
        *{
            margin: 0;
        }
        body {
            margin: 0px;
            padding: 0px 10px 0px 10px;
            -webkit-user-select: none;
            -moz-user-select: -moz-none;
            -ms-user-select: none;
            user-select: none;
        }
        h1{
            color: #2E86C1;
            cursor: pointer;
            font-family: "Agency FB";
        }
        header{
            background-image: url("images/background.jpg");
            height: auto;
            text-align: center;

        }
        .menu {
            overflow: hidden;
            font-weight: bold;
            font-family: "Comic Sans MS";
            text-align: center;
            padding-left: 80px;
            padding-top: 20px;
            width: auto;

        }
        .menu a {
            float: left;
            display: block;
            color: #f2f2f2;
            background-image: url("images/background5.jpg");
            text-align: center;
            padding: 15px 55px;
            text-decoration: none;
            font-size: 15px;
            opacity: 0.8;
        }

        .menu a:hover {
            background-image: url("images/banner4.jpg");
            color: royalblue;
        }

        .active {
            color: black;
            display: block;
        }

        .menu .icon {
            display: none;
        }

        table{
            alignment: center;
        }
        <!--  To hide scroll bars   -->
        ::-webkit-scrollbar {
            display: none;
        }
        @media screen and (max-width: 850px) {
            .menu a:not(:first-child) {display: none;}
            .menu a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 850px) {
            body{
                padding: 5px;
            }
            .menu.responsive {position: relative;}
            .menu.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .menu.responsive a {
                float: none;
                display: block;
                height: auto;
                    width: auto;
                text-align: left;
            }
            .menu {
                padding-left:0px;
                align-content: center;
            }

        }
    </style>
</head>
<body ng-app="HostelApp" ng-cloak>
<div>
    <header>
        <div class="menu"><h1>Hostel Management System</h1></div>
        <div class="menu" id="myMenu">
            <a href="#/!" class="active"><img src="images/icon-home.ico" height="20" width="30" align="left">Home</a>
            <a href="#!about" class="active"><img src="images/icon-info2.png" height="20" width="20" align="left">&nbsp;About</a>
            <a href="#!login" class="active"><img src="images/icon-login2.png" height="16" width="20">&nbsp;Login</a>
            <a href="#!student" class="active"><img src="images/icon-student.png" height="20" width="20" align="left">&nbsp;Student</a>
            <a href="#!gallery" class="active"><img src="images/icon-gallery2.png" height="20" width="20" align="left">&nbsp;Gallery</a>
            <a href="#!contact" class="active"><img src="images/icon-contact2.png" height="20" width="20" align="left">&nbsp;Contact</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="menuSymbol()">&#9776;</a>
        </div>
    </header>
    <script>
        function menuSymbol() {
            var x = document.getElementById("myMenu");
            if (x.className === "menu") {
                x.className += " responsive";
            } else {
                x.className = "menu";
            }
        }
    </script>
    <ng-view></ng-view>
</div>
</body>
</html>