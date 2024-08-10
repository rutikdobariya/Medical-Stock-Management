<?php 
    session_start(); 
    if(isset($_SESSION['id']) && isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="style.css" >
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="form"> 
            <form  action="PHP_P_5-9_Login.php" method="POST">
                <h1 class="text-heading">Hello, <?php echo $_SESSION['name']; ?></h1>
                <a href="logout.php">Logout</a>
            </form>
        </div>
    </body>
</html>
<?php
    } else{
        header("Location: index.php");
        exit();
    }
?>
