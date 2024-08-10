<?php   
    session_start();
    include 'connection.php';
    if(isset($_POST['email']) && isset($_POST['number']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['email']);
        $number = validate($_POST['number']);

        if(empty($email)){
            header("Location: PHP_P_5-9_Forgot.php?error=Email Name is Required");
            exit();
        }elseif(empty($number)){
            header("Location: PHP_P_5-9_Forgot.php?error=Mobile Number is Required");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE email='$email' AND mobile_number='$number'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['email'] === $email && $row['mobile_number'] === $number){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['number'] = $row['mobile_number'];
                    header("Location: PHP_P_5-9_NewPassword.php");
                    exit();
                } else {
                    header("Location: PHP_P_5-9_Forgot.php?error=Incorrect Email or Mobile Number");
                    exit();
                }
            } else {
                header("Location: PHP_P_5-9_Forgot.php?error=Incorrect Email or Mobile Number");
                exit();
            }
        }
    }
    else{
        header("Location: PHP_P_5-9_Forgot.php");
        exit();
    }
?>
