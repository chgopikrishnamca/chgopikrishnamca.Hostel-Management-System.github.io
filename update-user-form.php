<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$uid = $_GET['uid'];
$sql = 'SELECT * FROM users WHERE uid=:uid';
$statement = $connection->prepare($sql);
$statement->execute([':uid' => $uid ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) ) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = 'UPDATE users SET name=:name, username=:username, email=:email, phone=:phone, password=:password WHERE uid=:uid';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':username' => $username, ':email' => $email, ':phone' => $phone, ':password' => $password, ':uid' => $uid])) {
        header("Location: http://localhost:8080/myhostel/show-users.php");
    }
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update User</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input value="<?= $person->username; ?>" type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= $person->email; ?>" type="email"  name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input value="<?= $person->phone; ?>" type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?= $person->password; ?>" type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>