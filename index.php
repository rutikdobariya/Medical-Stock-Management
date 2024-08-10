<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css" >
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="form"> 
            <form  action="PHP_P_5-9_Login.php" method="POST">
                <h1 class="text-heading">Login Page</h1>

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
                            <!-- Email -->
                            <th><label class="text-lable">Eneter Email</label></th> 
                            <td><input class="form-element" type="email" name="email" placeholder="Enter Email" required></td>
                        </tr>

                        <tr>
                            <!-- Password -->
                            <th><label class="text-lable">Enter Password</label></th>
                            <td><input class="form-element" type="password" name="password" placeholder="Password" required></td>    
                        </tr>
                        <tr>
                            <th colspan="2">
                                <label class="text-lable"><a class="signup-link" href="PHP_P_5-9_Forgot.php" style="text-align: center;
                                        margin-top: 20px;
                                        color: #4158d0; 
                                        text-decoration: underline;">Forgot Password?</a>
                                </label>
                            </th>
                        </tr>

                        <tr align="center">
                            <!-- Submit -->
                            <td colspan="2"><input class="btn submit" type="submit" value="Login" name="submit"></td>
                        </tr>

                    </tbody>
                </table>
            </form>
            <table cellspacing="0" cellpadding="8" align="center">
                <tr>
                    <th colspan="2">
                        <label class="text-lable"style="margin-top: 20px;">Not A member? <a class="signup-link" href="PHP_P_5-9_Register.php" style="text-align: center;
                                        margin-top: 20px;
                                        color: #4158d0; 
                                        text-decoration: underline;">sign up</a>
                        </lable>
                    </th>
                </tr>
            </table>
            
        </div>
    </body>
</html>
