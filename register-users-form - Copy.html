<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body background="images/background5.jpg">

<?php
require 'db.php';
$message = '';
if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['usertype']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = 'INSERT INTO users(name, username, usertype, email, phone, password) VALUES(:name, :username, :usertype, :email, :phone, :password)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':username' => $username, ':usertype' => $usertype, ':email' => $email, ':phone' => $phone, ':password' => $password])) {
        $message = 'User Details Saved..';
    }
}

?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>User Registration</h2>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                </div>
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <span id="error"></span>
            <form method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th><label for="name">Name</label></th>
                        <td><input type="text" name="rollno" id="rollno" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th><label for="name">User Name</label></th>
                        <td><input type="text" name="rollno" id="rollno" class="form-control" onblur="checkUserName(this.value)" required></td>
                    </tr>
                    <tr>
                        <th><label for="usertype">Designation</label></th>
                        <td><select name="usertype" id="usertype" class="form-control" required>
                                <option>Admin</option>
                                <option>Warden</option>
                                <option>Clerk</option>
                                <option>Student Coordinator</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th><label for="email">Email</label></th>
                        <td><input type="email" name="email" id="email" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th><label for="phone">Phone</label></th>
                        <td><input type="phone" name="phone" id="phone" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Confirm Password</th>
                        <td>
                            <input type="password"  name="password2" id="password2" class="form-control" onblur="checkPassword(this.value)" required>
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-info">Submit</button>&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-danger">Reset</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
    function checkUserName(r)
    {
        var obj;
        if(window.XMLHttpRequest)
        {
            obj=new XMLHttpRequest();
        }
        else
        {
            obj=new ActiveXObject("Microsoft.XMLHTTP");
        }

        obj.onreadystatechange=function(){
            if(obj.readyState==4 && obj.status==200)
            {
                document.getElementById("error").innerHTML=obj.responseText;
            }
        }

        obj.open("GET","checkUserName.php?username="+r,true);
        obj.send();
    }
    function checkPassword(r){
        var password = document.getElementById("password").value;
        var password2 = document.getElementById("password2").value;
        if(password != password2){
            alert("Passwords Not Matched");
        }
    }
</script>
<?php require 'footer.php'; ?>
