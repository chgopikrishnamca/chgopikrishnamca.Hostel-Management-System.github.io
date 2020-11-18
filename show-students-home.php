<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
        @media print {
            #print {
                display :  none;
            }
        }
    </style>
</head>
<body>
<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "myhostel";
$con=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($con,$mysql_database) or die("Could not select database");
$rollno = $_GET['rollno'];
$sql = "select * from student as s,student_hostel as sh where s.rollno =sh.rollno && s.rollno = '".$rollno."'";
$result = mysqli_query($con,$sql);?><br><br><br>
<div style="text-align: center; font-family: 'Agency FB';font-weight: bold;font-size: 40px"><u>Student Details</u></div><br><br>
<div style="padding-left: 80px;padding-right: 80px">
    <table width="70%" class="table" style="border-style:solid;">
        <tr style="background-color:deepskyblue; color:white">
            <th><strong>Roll No</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Branch</strong></th>
            <th><strong>Course</strong></th>
            <th><strong>Year</strong></th>
            <th><strong>Mess Due</strong></th>
        </tr>
        <?php if (mysqli_num_rows($result)>0) {  $i=0;
            while($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="<?php echo ($i%2) ? 'even' : 'odd' ?>">
                    <td><?php echo $row['rollno'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['branch'];?></td>
                    <td><?php echo $row['course'];?></td>
                    <td><?php echo $row['year'];?></td>
                    <td><?php echo $row['bill'];?></td>
                </tr>


                <?php $i++;}}
        ?>
    </table><br>
        <div style="text-align: center">
            <input type=button id="print" value="Print Details" onClick="javascript:window.print()" class="btn btn-success">
        </div>

</div>

<DIV>

</DIV>

</body>
</html>
