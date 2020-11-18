<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body background="images/background5.jpg">

<?php
require 'db.php';
$message = '';
if (isset($_POST['rollno']) && isset($_POST['name']) && isset($_POST['branch']) && isset($_POST['course']) && isset($_POST['year']) && isset($_POST['join_date']) && isset($_POST['vacate_date']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']) ) {
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $join_date = $_POST['join_date'];
    $vacate_date = $_POST['vacate_date'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = 'INSERT INTO student(rollno, name, branch, course, year, join_date, vacate_date, phone, email, address) VALUES(:rollno, :name, :branch, :course, :year, :join_date, :vacate_date, :phone, :email, :address)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':rollno' => $rollno, ':name' => $name, ':branch' => $branch, ':course' => $course, ':year' => $year, ':join_date' => $join_date, ':vacate_date' => $vacate_date, ':phone' => $phone, ':email' => $email, ':address' => $address])) {
        $message = 'Student Details Saved..';
    }
}

?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Student Registration</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <span id="error"></span>
            <form method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td><label for="rollno">Roll No</label></td>
                        <td><input type="text" name="rollno" id="rollno" class="form-control" onblur="checkRollNumber(this.value)" required></td>
                    </tr>
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text" name="name" id="name" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="branch">Branch</label></td>
                        <td><select name="branch" id="branch" class="form-control" required>
                                <option>-- Select Branch --</option>
                                <option>MCA</option>
                                <option>M.Tech</option>
                                <option>B.Tech</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="course">Course</label></td>
                        <td><select name="course" id="course" class="form-control" required>
                                <option>-- Select Course --</option>
                                <option>MCA</option>
                                <option>Civil</option>
                                <option>IT</option>
                                <option>CSE</option>
                                <option>MECH</option>
                                <option>EEE</option>
                                <option>ECE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="year">Course Year</label></td>
                        <td><select name="year" id="year" class="form-control" required>
                                <option>-- Select Year --</option>
                                <option>I</option>
                                <option>II</option>
                                <option>III</option>
                                <option>IV</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="join_date">Date of Joined</label></td>
                        <td><input type="date" name="join_date" id="join_date" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="vacate_date">Date of Vacated</label></td>
                        <td><input type="date" name="vacate_date" id="vacate_date" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Mobile No</label></td>
                        <td><input type="text" name="phone" id="phone" class="form-control" minlength="10"  maxlength="10" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="address">Address</label></td>
                        <td><textarea class="form-control" name="address" id="address" rows="5" cols="10" required></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-info">Submit</button>&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-danger">Reset</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
    function checkRollNumber(r)
    {
        var obj;
        if(window.XMLHttpRequest)
        {
            obj=new XMLHttpRequest();
        }
        else
        {
            obj=new ActiveXObject("Microsoft.XMLHTTP");
        }

        obj.onreadystatechange=function(){
            if(obj.readyState==4 && obj.status==200)
            {
                document.getElementById("error").innerHTML=obj.responseText;
            }
        }

        obj.open("GET","checkRollNumber.php?rollno="+r,true);
        obj.send();
    }
</script>
<?php require 'footer.php'; ?>
