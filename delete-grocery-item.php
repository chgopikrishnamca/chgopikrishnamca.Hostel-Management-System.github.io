<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$item_id= $_GET['item_id'];
$sql = 'SELECT * FROM grocery_list WHERE item_id=:item_id';
$statement = $connection->prepare($sql);
$statement->execute([':item_id' => $item_id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['item_name'])  && isset($_POST['item_qty']) && isset($_POST['item_price'])) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_qty = $_POST['item_qty'];
    $sql = 'UPDATE grocery_list SET item_name=:item_name, item_qty=:item_qty, item_price=:item_price WHERE item_id=:item_id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':item_name' => $item_name, ':item_qty' => $item_qty, ':item_price' => $item_price])) {
        header("Location: show-grocery.php");
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