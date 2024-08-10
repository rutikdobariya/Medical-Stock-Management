<?php

    include 'connection.php';

    $id = $_GET['ids'];

    $query = "SELECT * FROM users WHERE id=$id";
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($data);

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
            <form  action="PHP_P_5-8_UpdateSave.php" method="POST">
                <h1 class="text-heading">Registration Form</h1>
                <table cellspacing="0" cellpadding="8">

                    <tbody>

                        <tr>
                            <!-- User id -->
                            <td><input class="form-element" type="hidden" name="id" value="<?php echo $row['id'] ?>" required></td>    
                        </tr>
                        <tr>
                            <!-- User Name -->
                            <th><label class="text-lable">Name</label></th>
                            <td><input class="form-element" type="text" name="user-name" value="<?php echo $row['name'] ?>" required></td>    
                        </tr>

                        <tr>
                            <!-- User Type -->
                            <th><label class="text-lable">User Type</label></th>
                            <td>
                                <select class="form-element" name="user-type" required>
                                    <option class="form-element" value="">User Type</option>
                                    <?php if($row['user_type'] == "admin") {?>

                                        <option class="form-element" value="admin" selected>Admin</option>
                                        <option class="form-element" value="user">User</option>

                                    <?php } elseif($row['user_type'] == "user") {?>

                                        <option class="form-element" value="admin">Admin</option>
                                        <option class="form-element" value="user" selected>User</option>

                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <!-- Email -->
                            <th><label class="text-lable">Email</label></th> 
                            <td><input class="form-element" type="email" value="<?php echo $row['email'] ?>" name="email" required></td>
                        </tr>

                        <tr>
                            <!-- Phone -->
                            <th><label class="text-lable">Phone</label>
                            <td><input class="form-element" type="text" value="+91" disabled size="2">
                            <input class="form-element" type="number" value="<?php echo $row['mobile_number'] ?>" name="phone" required></td>
                        </tr>

                        <tr>
                            <!-- Current Address -->
                            <th><label class="text-lable">Address</label></th>
                            <td><input class="form-element" type="text" name="address" value="<?php echo $row['address'] ?>" required></td>    
                        </tr>

                        <tr>
                            <!-- Password -->
                            <th><label class="text-lable">Password</label></th>
                            <td><input class="form-element" type="password" value="<?php echo $row['password'] ?>" name="password" required></td>    
                        </tr>

                        <tr align="center">
                            <!-- Submit -->
                            <td colspan="2"><input class="btn submit" type="submit" value="save" name="submit"></td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
