<?php
require 'db.php';
$rollno = $_GET['rollno'];
$sql = 'DELETE FROM student WHERE rollno=:rollno';
$statement = $connection->prepare($sql);
if ($statement->execute([':rollno' => $rollno])) {
    header("Location: http://localhost:8080/myhostel/clerk-portal.php#!/getstudent");
}

?>