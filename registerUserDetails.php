<?php
/**
 * Created by PhpStorm.
 * User: Gopikrishna
 * Date: 13-Apr-18
 * Time: 12:12
 */
include ("includes/connect.php");
$data = json_decode(file_get_contents("php://input"));
if(count($data) > 0) {
    $name = mysqli_real_escape_string($con, $data->name);
    $username = mysqli_real_escape_string($con, $data->username);
    $usertype = mysqli_real_escape_string($con, $data->usertype);
    $email = mysqli_real_escape_string($con, $data->email);
    $phone = mysqli_real_escape_string($con, $data->phone);
    $password = mysqli_real_escape_string($con, $data->password);
    $query = "INSERT INTO users (name, username, usertype, email, phone, password, date_of_reg) VALUES ('$name', '$username', '$usertype', '$email', $phone, '$password',NOW())";
    if (mysqli_query($con, $query)) {
        echo "Data Inserted...";
    } else {
        echo 'Error';
    }
}
?>