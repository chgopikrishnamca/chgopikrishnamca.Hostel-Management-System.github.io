<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php
require 'db.php';
$sql = 'SELECT item_id, item_name, item_price, item_qty, net_price, item_qty*item_price FROM grocery_list';
$statement = $connection->prepare($sql);
$statement->execute();
$grocery_list = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>All Grocery Items and Prices</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Quantity</th>
                    <th>Net Price</th>
                    <th>Action</th>
                </tr>
                <?php foreach($grocery_list as $item): ?>
                    <tr>
                        <td><?= $item->item_id; ?></td>
                        <td><?= $item->item_name; ?></td>
                        <td><?= $item->item_price; ?></td>
                        <td><?= $item->item_qty; ?></td>
                        <td><?= ($item->item_qty)*($item->item_price) ?></td>
                        <td>
                            <a href="update-grocery-form.php?item_id=<?= $person->item_id ?>" class="btn btn-info"> Update</a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete-grocery-item.php?item_id=<?= $person->item_id ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
