<?php

$title = " EDIT USER ACCOUNT";

global $connect;

include_once "../config.php";

include_once "_userHeader.php";

if (!isset($_SESSION['submit'])){

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
        $firstName = check($_POST['firstName']);
        $lastName = check($_POST['lastName']);
        $userPhone = check($_POST['userPhone']);
        $resAddress = check($_POST['resAddress']);
        $email = check($_POST['userEmail']);
        $country = check($_POST['country']);
        $city = check($_POST['city']);

        $query = mysqli_query($connect, "SELECT * FROM shipping WHERE userID = '$userID' ");

        $num = mysqli_num_rows($query);

        if ($num === 1){

            array_push($errors, 'shipping address already added');
        }
        else{

            $register = mysqli_query($connect, "INSERT INTO shipping(userID,firstName,lastName,phoneNumber,email,resAddress,country,city) 
                        VALUES('$userID','$firstName','$lastName','$userPhone','$email','$resAddress','$country','$city')");
            if($register){


                echo "<script>alert('Shipping Address Added');</script>";
            }
            else{

                array_push($errors, 'shipping address not added');
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
            <?php include_once "content-header.php"; ?>

            <!-- main content -->
            <div class="main-content-wrapper">
                <h2 class="main-title">add shipping address</h2>

                <div class="content-box">
                    <div class="form-box">
                        <?php  foreach($errors as $error){ ?>
                            <div class="error-msg"><p><?= $error ?></p></div>
                        <?php } ?>

                        <form action="" method="POST" class="admin-form w-75">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" name="userID" id="formInput" value="<?= $row['userID'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="firstName" id="formInput" value="<?= $row['firstName'] ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="lastName" id="formInput" value="<?= $row['lastName'] ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="userEmail" id="formInput" value="<?= $row['userEmail'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="userPhone" id="formInput" value="<?= $row['userPhone'] ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="resAddress" id="formInput" placeholder="Residential Address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="city" id="formInput" placeholder="Your City" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="country" id="formInput" placeholder="Your Country" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" id="formSubmit" value="add shipping address">
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
