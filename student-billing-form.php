<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
        body{
         background-color: #b9bbbe;
        }
    </style>
</head>
<body>

<?php
require 'db.php';
$message = '';
if (isset($_POST['rollno']) && isset($_POST['roomno']) && isset($_POST['bill'])) {
    $rollno = $_POST['rollno'];
    $roomno = $_POST['roomno'];
    $bill = $_POST['bill'];
    $sql = 'INSERT INTO student_hostel(rollno, roomno, bill) VALUES(:rollno, :roomno, :bill)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':rollno' => $rollno, ':roomno' => $roomno, ':bill' => $bill])) {
        $message = 'Bill Details Saved..';
    }
}
?>
<div class="container"  style="padding-bottom: 100px">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Student - Add Bill </h2>
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
                        <td><label for="roomno">Room No</label></td>
                        <td><input type="text" name="roomno" id="roomno" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="branch">Bill</label></td>
                        <td><input type="text" name="bill" id="bill" class="form-control" required></td>
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

        obj.open("GET","checkRollNumberBill.php?rollno="+r,true);
        obj.send();
    }
</script>
<?php require 'footer.php'; ?>
