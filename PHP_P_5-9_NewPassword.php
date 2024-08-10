<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <link rel="stylesheet" href="style.css" >
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="form"> 
            <form  action="PHP_P_5-9_ResetPassword.php" method="POST">
                <h1 class="text-heading">Reset Password</h1>

                <?php if(isset($_GET['error'])) { ?>
                    <p class="error" style="background: #f2dede;
                                        color: #a94442;
                                        padding: 10px;
                                        width: 95%;
                                        border-radius: 5px;
                                        margin : 20px auto">
                        <?php echo $_GET['error'] ?>
                    </p>
                <?php } ?>
                <table cellspacing="0" cellpadding="8">

                    <tbody>

                        <tr>
                            <!-- Password -->
                            <th><label class="text-lable">Enter Password</label></th>
                            <td><input class="form-element" type="password" name="password" placeholder="Password" required></td>    
                        </tr>

                        <tr>
                            <!-- Confirm Password -->
                            <th><label class="text-lable">Confirm Password</label></th>
                            <td><input class="form-element" type="password" name="confirmPassword" placeholder="Confirm Password" required></td>    
                        </tr>

                        <tr align="center">
                            <!-- Submit -->
                            <td colspan="2"><input class="btn submit" type="submit" value="Save" name="ChangePassword"></td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
