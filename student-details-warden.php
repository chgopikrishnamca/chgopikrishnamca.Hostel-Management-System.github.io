<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
require 'db.php';
$sql = 'SELECT * FROM student as s,student_hostel as sh WHERE s.rollno=sh.rollno ORDER BY s.rollno, s.branch, s.course';
$statement = $connection->prepare($sql);
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>Student Details</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Join Date</th>
                    <th>Vacated Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Mess Due</th>
                </tr>
                <?php foreach($students as $person): ?>
                    <tr>
                        <td><?= $person->rollno; ?></td>
                        <td><?= $person->name; ?></td>
                        <td><?= $person->branch; ?></td>
                        <td><?= $person->course; ?></td>
                        <td><?= $person->year; ?></td>
                        <td><?= $person->join_date; ?></td>
                        <td><?= $person->vacate_date; ?></td>
                        <td><?= $person->phone; ?></td>
                        <td><?= $person->email; ?></td>
                        <td><?= $person->address; ?></td>
                        <td><?= $person->bill; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div style="text-align: center">
                <input type=button value="Print Details" id="print" onClick="javascript:window.print()" class="btn btn-success">
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
