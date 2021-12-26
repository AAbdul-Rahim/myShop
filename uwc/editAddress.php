<?php

$title = " EDIT USER ACCOUNT";

include_once "../config.php";

global $connect;

include_once '_userHeader.php';

$userID = $_GET['benim'];

if (!isset($_SESSION['submit']) && !($userID) ){

    echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

}
else{

    $errors = [];

    if(trim($_GET['benim']) !== '') {


        $userID = $_GET['benim'];

        $query = mysqli_query($connect, "SELECT * FROM shipping WHERE userID = '$userID' ");

        $row = mysqli_fetch_assoc($query);

        extract($row);

    }
    if (isset($_POST['submit'])) {

        function check($data)
        {

            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            return $data;
        }



        $query = mysqli_query($connect, "SELECT * FROM shipping WHERE userID = '$userID' ");

        $num = mysqli_num_rows($query);



            $userID = check($_POST['userID']);
            $firstName = check($_POST['firstName']);
            $lastName = check($_POST['lastName']);
            $userPhone = check($_POST['userPhone']);
            $email = check($_POST['userEmail']);
            $resAddress = check($_POST['resAddress']);
            $country = check($_POST['country']);
            $city = check($_POST['city']);

            $query = mysqli_query($connect, "UPDATE shipping SET firstName = '$firstName', lastName = '$lastName',email = '$email', phoneNumber = '$userPhone',
                                resAddress = '$resAddress', country = '$country', city = '$city' WHERE userID = '$userID' ");

            if ($query) {

                echo "<script>alert('customer address info updated.')</script>";
                echo "<script>window.location='dashboard.php?benim=$userID'</script>";
            } else {

                array_push($errors, 'sorry shipping address not updated. try again!');
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
                <h2 class="main-title">edit shipping address</h2>

                <div class="content-box">
                    <div class="form-box">
                        <?php  foreach($errors as $error){ ?>
                            <div class="error-msg"><p><?= $error ?></p></div>
                        <?php } ?>

                        <form action="" method="POST" class="admin-form">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" name="userID" id="formInput" value="<?= $userID ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="firstName" id="formInput" value="<?= $firstName ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="lastName" id="formInput" value="<?= $lastName ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="userEmail" id="formInput" value="<?= $email ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="userPhone" id="formInput" value="<?= $phoneNumber ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="resAddress" id="formInput" value="<?= $resAddress ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="city" id="formInput" value="<?= $city ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="country" id="formInput" value="<?= $country ?>" >
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" id="formSubmit" value="edit address">
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