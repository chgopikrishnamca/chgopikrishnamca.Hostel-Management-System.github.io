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
            <h2>Update Grocery Items</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="item_id">Item ID</label>
                    <input value="<?= $person->item_id; ?>" type="text" name="item_id" id="item_id" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input value="<?= $person->item_name; ?>" type="text" name="item_name" id="item_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="item_price">Item Price</label>
                    <input value="<?= $person->email; ?>" type="text"  name="item_price" id="item_price" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>