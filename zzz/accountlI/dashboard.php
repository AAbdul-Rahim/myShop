<?php

$title = " USER DASHBOARD";

include_once "../config.php";

include_once '_userHeader.php';

global $connect;

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

}
else{

    $userID = $_GET['benim'];


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
                <h2 class="main-title">main home</h2>
            </div>

        </div>
        <!-- overlay -->
        <div class="overlay"></div>


    </div>

<?php
    include_once "_userFooter.php";
}
?>