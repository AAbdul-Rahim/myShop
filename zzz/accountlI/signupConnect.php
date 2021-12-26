<?php

include_once "../config.php";
global $connect;
$errors = [];

if (isset($_POST['submit'])) {

    function check($data)
    {

        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }

    $inputFirstName = check($_POST['firstName']);
    $inputLastName = check($_POST['lastName']);
    $inputGender = check($_POST['gender']);
    $inputEmail = check($_POST['email']);
    $inputPhone = check($_POST['phone']);
    $userType = check($_POST['userType']);
    $country = check($_POST['country']);
    $inputPassword = check(sha1($_POST['userPassword']));
    $confirmPass = check(sha1($_POST['confirmPass']));


    // use to generate user id
    $rand = uniqid();
//    $month = date('m');
//    $year = substr(date('Y'), 2);
    $fname = substr($_POST['firstName'], 0, 2);
    $lname = substr($_POST['lastName'], 0, 2);

    $userID = $fname.$lname.$rand;

    if ($userType === 'customer'){
        $sellerStatus = 'inactive';
    }
    else{
        $sellerStatus = 'pending';
    }

    $query = mysqli_query($connect, "SELECT * FROM users WHERE userEmail = '$inputEmail' AND userPassword = '$inputPassword' ");
    $num = mysqli_num_rows($query);

    if ($inputPassword !== $confirmPass) {

        echo "<script>alert('Passwords do not Match. Try Again!');</script>";
        echo "<script>window.location='login-register.php'</script>";
    }
    else{
        if ($num === 1) {

            echo "<script>alert('User Account Already Exist');</script>";
            echo "<script>window.location='login-register.php'</script>";
        }
        else {

            $register = mysqli_query($connect, "INSERT INTO users(userID,firstName,lastName,userEmail,gender,userType,country,userPhone,sellerStatus,userPassword) 
                    VALUES('$userID','$inputFirstName','$inputLastName','$inputEmail','$inputGender','$userType','$country','$inputPhone','$sellerStatus','$inputPassword')");

            if ($register){

                echo "<script>alert('Account Created Successfully');</script>";
                echo "<script>window.location='login-register.php'</script>";
            }
            else{
                echo "<script>alert('User Account not Created. Try Again');</script>";
                echo "<script>window.location='login-register.php'</script>";

            }


        }
    }

}
