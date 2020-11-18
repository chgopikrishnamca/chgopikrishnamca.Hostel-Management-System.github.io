<?php
include("includes/connect.php");
?>

    <div class="container">
        <h1>Forgot Password</h1>
        <?php
        if(isset($_POST['submit']))
        {
            $email=$_POST['email'];
            $res=mysqli_query($con,"select 
			id,email,username from register 
			where email='$email'");
            if(mysqli_num_rows($res)==1)
            {
                $row=mysqli_fetch_assoc($res);
                $to=$email;
                $id=base64_encode($email);
                $subject="Reset Password-GoPHP";
                $headers="Content-Type:text/html";
                $message="Hi ".$row['username'].",<br><br>
				Your reset password request received 
				successfully please click the below link
				to Reset your Password<br><br>
				<a target='_blank' 
				href='http://localhost:8080/usermgt/reset_pwd.php?key=".$id."'>Reset Password</a><br><br>
				Thanks<br>GoPHP<br>";
                if(mail($to,$subject,$message,$headers))
                {
                    echo "Reset Password Link has sent 
					to you email please check";
                }
                else
                {
                    echo "Sorry! Unable to send an Email. 
					Please Conatct admin";
                }
            }
            else
            {
                echo "<p class='alert alert-danger'>
				Sorry! Email Does not exists with our DB</p>";
            }
        }
        ?>

        <form action="" method="POST"
              onsubmit="return loginValidate()">
            <table class="tsable">
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="text" name="email"
                               id="email" class="form-control"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input class="btn btn-primary"
                               type="submit" name="submit"
                               value="Submit">

                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        //Stpe2
        function loginValidate()
        {
            if(document.getElementById("email").value=="")
            {
                alert("Enter Email");
                return false;
            }

        }
    </script>
<?php
include("includes/footer.php");
?>