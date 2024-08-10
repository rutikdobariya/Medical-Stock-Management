<?php   
    session_start();
    include 'connection.php';
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if(empty($email)){
            header("Location: index.php?error=Email Name is Required");
            exit();
        }elseif(empty($password)){
            header("Location: index.php?error=Password is Required");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['email'] === $email && $row['password'] === $password){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    header("Location: index.php?error=Incorrect Email or Password");
                    exit();
                }
            } else {
                header("Location: index.php?error=Incorrect Email or Password");
                exit();
            }
        }
    }
    else{
        header("Location: index.php");
        exit();
    }
