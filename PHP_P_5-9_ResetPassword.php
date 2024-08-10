<?php   
    session_start();
    include 'connection.php';
    if(isset($_POST['password']) && isset($_POST['confirmPassword']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $password = validate($_POST['password']);
        $confirmPassword = validate($_POST['confirmPassword']);
        $email = $_SESSION['email'];
        $number = $_SESSION['number'];
        $id = $_SESSION['id'];
        
        if(empty($password)){
            header("Location: PHP_P_5-9_NewPassword.php?error=Password is Required");
            exit();
        }elseif(empty($confirmPassword)){
            header("Location: PHP_P_5-9_NewPassword.php?error=Confirm Password is Required");
            exit();
        }elseif($password !== $confirmPassword){
            header("Location: PHP_P_5-9_NewPassword.php?error=Password And Confirm Password doesn't match.");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE email='$email' AND mobile_number='$number'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['email'] === $email && $row['mobile_number'] === $number){

                    $sql1 = "UPDATE users SET password='$confirmPassword' WHERE id = $id AND email = '$email' AND mobile_number = '$number'";
                    $result1 = mysqli_query($conn,$sql1);
                    
                    if($result1) {
                        header("Location: PHP_P_5-9_Login.php");
                        exit();
                    } else {
                        header("Location: PHP_P_5-9_NewPassword.php?error=Error in Reset Password");
                    }
                    
                } else {
                    header("Location: PHP_P_5-9_NewPassword.php?error=Incorrect Email or Mobile Number");
                    exit();
                }
            } else {
                header("Location: PHP_P_5-9_NewPassword.php?error=Incorrect Email or Mobile Number");
                exit();
            }
        }
    }
    else{
        header("Location: PHP_P_5-9_NewPassword.php");
        exit();
    }
?>
