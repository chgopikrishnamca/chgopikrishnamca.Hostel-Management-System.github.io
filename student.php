<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
        body{
            background-color: #868e96;
        }
        input[type=text]{
            width: 25%;
            height: 50px;
            border-style: solid groove;
            font-size: 20px;
            font-family: "Agency FB";
        }
        input[type=submit]{
            width: 10%;
            font-size: 20px;
            font-family: "Agency FB";
            background-color: limegreen;
            margin-bottom: 60px;
        }
    </style>
</head>
<body><br><br><br><br><br><br>
<div style="color: white;font-family: 'Agency FB';font-size: 40px;text-align: center;font-weight: bold">Enter Your Roll No. to get Your Details</div><br><br>
<div style="text-align: center;font-family: 'Comic Sans MS';">
    <form action="show-students-home.php" method="get">
       <center> <input type="text" name="rollno" class="form-control" placeholder="Enter Your Roll No. here" style="text-align: center;font-weight: bold;font-family: 'Comic Sans MS';text-align: center"></center>
        <br><br>
        <div style="text-align: center"><input type="submit" value="Search"><br></div><br><br>
    </form>
</div>
</body>
</html>