<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['user-name'];
        $user_type = $_POST['user-type'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        include 'connection.php';

        $query = "INSERT INTO users (id, user_type, name, email, mobile_number, address, password) VALUES (NULL, '$user_type', '$name', '$email', '$phone', '$address', '$password')";

        $status = mysqli_query($conn, $query);
        // echo $status;

        if($status)
        {
            header("Location:index.php");
            echo "<h1 class=\"text-heading\">User Have Been Successfully Registered.</h1>";
        }
        else
            echo "<h1 class=\"text-heading\">Some Problem occure to Insert Record.</h1>";

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" href="style.css" >
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="form"> 
            <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h1 class="text-heading">Registration Form</h1>
                <table cellspacing="0" cellpadding="8">

                    <tbody>

                        <tr>
                            <!-- User Name -->
                            <th><label class="text-lable">Name</label></th>
                            <td><input class="form-element" type="text" name="user-name" required></td>    
                        </tr>

                        <tr>
                            <!-- User Type -->
                            <th><label class="text-lable">User Type</label></th>
                            <td>
                                <select class="form-element" name="user-type" required>
                                    <option class="form-element" value="">User Type</option>
                                    <option class="form-element" value="admin">Admin</option>
                                    <option class="form-element" value="user">User</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <!-- Email -->
                            <th><label class="text-lable">Email</label></th> 
                            <td><input class="form-element" type="email" name="email" required></td>
                        </tr>

                        <tr>
                            <!-- Phone -->
                            <th><label class="text-lable">Phone</label>
                            <td><input class="form-element" type="text" value="+91" disabled size="2">
                            <input class="form-element" type="number" name="phone" required></td>
                        </tr>

                        <tr>
                            <!-- Current Address -->
                            <th><label class="text-lable">Address</label></th>
                            <td><textarea class="form-element-textarea" name="address" cols="25" rows="3" required>
                            </textarea></td>
                        </tr>

                        <tr>
                            <!-- Password -->
                            <th><label class="text-lable">Password</label></th>
                            <td><input class="form-element" type="password" name="password" required></td>    
                        </tr>

                        <tr align="center">
                            <!-- Submit -->
                            <td colspan="2"><input class="btn submit" type="submit" value="Register" name="submit"></td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
