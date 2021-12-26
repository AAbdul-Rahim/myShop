<?php

include_once "../config.php";

global $connect;

$errors = [];

if (isset($_POST['submit'])){


    function check($data){

        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }

    $inputEmail = check($_POST['userEmail']);
    $inputPassword = check(sha1($_POST['userPassword']));

    $query = mysqli_query($connect, "SELECT * FROM users WHERE userEmail = '$inputEmail' AND userPassword = '$inputPassword' ");
    $num = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);

    if ($num === 1){

        $_SESSION['userName'] = $row['lastName'];
        $_SESSION['userID'] = $row['userID'];
        echo "<script>window.location= 'index.php?benim=$row[userID]';</script>";

    }else{
        echo "<script>alert('Wrong Email or Password. Try Again!');</script>";
        echo "<script>window.location='login-register.php'</script>";
    }

    $_SESSION['submit'] = true;
}