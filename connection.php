<?php
    // Make connection
    $conn = mysqli_connect('localhost','root','');
    
    // Select Database
    $database = mysqli_select_db($conn,'php_pharmacy');
