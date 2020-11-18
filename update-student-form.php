<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$rollno = $_GET['rollno'];
$sql = 'SELECT * FROM student WHERE rollno=:rollno';
$statement = $connection->prepare($sql);
$statement->execute([':rollno' => $rollno ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['name'])  && isset($_POST['year']) && isset($_POST['vacate_date']) && isset($_POST['phone'])&& isset($_POST['email']) && isset($_POST['bill'])) {
    $name = $_POST['name'];
    $year = $_POST['username'];
    $vacate_date=$_POST['vacate_date'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sql = 'UPDATE student SET name=:name, year=:year, vacate_date=:vacate_date, phone=:phone, email=:email WHERE rollno=:rollno';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':year' => $username, ':vacate_date' => $vacate_date, ':phone' => $phone, ':email' => $email, ':rollno' => $rollno])) {
        header("Location: show-students-clerk.php");
    }
}
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Student Data</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="rollno">Roll No</label>
                    <input value="<?= $person->rollno; ?>" type="text" name="rollno" id="rollno" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="year">Year of Study</label>
                    <input value="<?= $person->year; ?>" type="text" name="year" id="year" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vacate_date">Vacated Date</label>
                    <input value="<?= $person->vacate_date; ?>" type="date" name="vacate_date" id="vacate_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input value="<?= $person->phone; ?>" type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= $person->email; ?>" type="email"  name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>