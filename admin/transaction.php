<li>
    <a href="userOrders.php">
        <i class="fa fa-boxes"></i>
        <span>orders</span>
    </a>
</li>a<?php
$title = " USERS ORDERS";
include_once "../config.php";
include_once "_header.php";

global $connect;


if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";
}
else{
    ?>

    <div class="dashboard-wrapper">
        <!-- side bar -->
        <?php include_once "sidebar.php"; ?>

        <!-- content -->
        <div class="content-wrapper">

            <!-- header -->
            <?php include_once "content-header.php"; ?>

            <!-- main content -->
            <div class="main-content-wrapper">
                <h2 class="main-title">all transactions</h2>

                <div class="content-box">
                </div>
            </div>

        </div>
        <!-- overlay -->
        <div class="overlay"></div>
    </div>




<?php }

include_once "_footer.php";
?>


