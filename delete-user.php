<?php
require 'db.php';
$uid = $_GET['uid'];
$sql = 'DELETE FROM users WHERE uid=:uid';
$statement = $connection->prepare($sql);
if ($statement->execute([':uid' => $uid])) {
    header("Location: http://localhost:8080/myhostel/admin-portal.php#!/showusers");
}

?>