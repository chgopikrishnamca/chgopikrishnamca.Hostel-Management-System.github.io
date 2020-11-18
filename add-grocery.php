<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$message = '';
if (isset ($_POST['item_name'])  && isset($_POST['item_price'])  && isset($_POST['item_qty']) ) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_qty = $_POST['item_qty'];
    $sql = 'INSERT INTO grocery_list(item_name, item_price, item_qty) VALUES(:item_name, :item_price, :item_qty)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':item_name' => $item_name, ':item_price' => $item_price, ':item_qty' => $item_qty])) {
        $message = 'Grocery Details Saved';
    }
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Add Grocery</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="item_name"> Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="item_price">Price</label>
                    <input type="text" name="item_price" id="item_price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="item_qty">Quantity</label>
                    <input type="text" name="item_qty" id="item_qty" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Save Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
