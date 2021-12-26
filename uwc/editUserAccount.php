<?php

$title = " EDIT USER ACCOUNT";

global $connect;

include_once "../config.php";

include_once "_userHeader.php";

$userID = $_GET['benim'];

if (!isset($_SESSION['submit']) && !($userID) ){

    echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

}
else{

    $errors = [];


    if(trim($_GET['benim']) !== '') {


        $userID = $_GET['benim'];

        $query = mysqli_query($connect, "SELECT * FROM users WHERE userID = '$userID' ");

        $row = mysqli_fetch_assoc($query);

    }
    if (isset($_POST['submit'])){

        function check($data){

            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            return $data;
        }

        $userID = check($_POST['userID']);
        $inputFirstName = check($_POST['firstName']);
        $inputLastName = check($_POST['lastName']);
        $inputGender = check($_POST['gender']);
        $inputEmail = check($_POST['email']);
        $inputPhone = check($_POST['phone']);
        $userType = check($_POST['userType']);
        $country = check($_POST['country']);
        $inputPassword = check(sha1($_POST['userPassword']));
        $confirmPass = check(sha1($_POST['confirmPass']));

        if ($inputPassword !== $confirmPass){

            array_push($errors,"passwords do not match");
        }
        else{

            $update = mysqli_query($connect, "UPDATE users SET  firstName = '$inputFirstName',lastName = '$inputLastName'
                 ,userEmail = '$inputEmail',gender = '$inputGender',userType = '$userType',sellerStatus = 'inactive',
                 country = '$country', userPhone = '$inputPhone', userPassword = '$inputPassword' WHERE userID = '$userID' ");

            if($update){

                array_push($errors, '.');

                echo "<script>alert('Account Info Updated');</script>";
                echo "<script>window.location='login-register.php'</script>";

            }
            else{

                array_push($errors, 'sorry account info not updated. try again!');
            }

        }
    }



    ?>
    <div class="dashboard-wrapper">

        <!-- side bar -->
        <?php include_once "userSideBar.php"; ?>

        <!-- content -->
        <div class="content-wrapper">

            <!-- header -->
            <?php include_once "_content-header.php"; ?>

            <!-- main content -->
            <div class="main-content-wrapper">
                <h2 class="main-title">edit user account</h2>

                <div class="content-box">
                    <div class="form-box">
                        <?php  foreach($errors as $error){ ?>
                            <div class="error-msg"><p><?= $error ?></p></div>
                        <?php } ?>

                        <form action="" method="POST" class="admin-form">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="userID" id="formInput" value="<?= $row['userID'] ?>">
                                        <input type="text" name="firstName" id="formInput" value="<?= $row['firstName'] ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="lastName" id="formInput" value="<?= $row['lastName'] ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email" id="formInput" value="<?= $row['userEmail'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="gender" id="formInput" value="<?= $row['gender'] ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="userType" id="formInput" value="<?= $row['userType'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" id="formInput" value="<?= $row['userPhone'] ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="country" id="formInput" value="<?= $row['country'] ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="userPassword" id="formInput" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="confirmPass" id="formInput" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" id="formSubmit" value="edit account" required>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- overlay -->
        <div class="overlay"></div>


    </div>

    <?php
    include_once "_userFooter.php";

}
?>