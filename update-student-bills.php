<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$rollno = $_GET['rollno'];
$sql = 'SELECT s.rollno, s.name, sh.roomno, sh.bill FROM student as s, student_hostel as sh WHERE s.rollno=:rollno';
$statement = $connection->prepare($sql);
$statement->execute([':rollno' => $rollno ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['roomno']) && isset($_POST['bill'])) {
    $name = $_POST['name'];
    $roomno = $_POST['roomno'];
    $bill = $_POST['bill'];
    $sql = 'UPDATE student_hostel SET roomno=:roomno, bill=:bill WHERE rollno=:rollno';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':rollno' => $rollno,':roomno' => $roomno, ':bill' => $bill])) {
        header("Location: show-students-bill.php");
    }
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Bill Details</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="rollno">Roll No</label>
                    <input value="<?= $person->rollno; ?>" type="text" name="rollno" id="rollno" disabled class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="roomno">Room No</label>
                    <input value="<?= $person->roomno; ?>" type="text" name="roomno" id="roomno" class="form-control">
                </div>
                <div class="form-group">
                    <label for="bill">Email</label>
                    <input value="<?= $person->bill; ?>" type="text"  name="bill" id="bill" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>