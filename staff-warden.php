<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$sql = 'SELECT * FROM users';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>Staff Members Details</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Email ID</th>
                    <th>Phone</th>
                    <th>Registration Date</th>
                </tr>
                <?php foreach($people as $person): ?>
                    <tr>
                        <td><?= $person->uid; ?></td>
                        <td><?= $person->name; ?></td>
                        <td><?= $person->username; ?></td>
                        <td><?= $person->usertype; ?></td>
                        <td><?= $person->email; ?></td>
                        <td><?= $person->phone; ?></td>
                        <td><?= $person->date_of_reg; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
