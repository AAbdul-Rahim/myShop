<?php
include_once "../config.php";
global $connect;

$query = mysqli_query($connect, "SELECT * FROM admin WHERE adminName = '$_SESSION[adminName]' ");

$row = mysqli_fetch_assoc($query);
?>
<!-- sidebar -->
<nav class="sidebar-wrapper">
    <div class="sidebar-header-wrapper">
        <!-- logo -->
        <div class="sidebar-logo"><a href="">my shop</a></div>
        <!-- toggle btn -->
        <div class="toggle-close toggle-btn">
            <i class="fa fa-times"></i>
        </div>
    </div>
    <!-- side menus -->
    <div class="sidebar-menu-wrapper">
        <ul>
            <ul>
                <h5>account info</h5>
                <hr>
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-user"></i>
                        <span>account summary</span>
                    </a>
                </li>
                <li>
                    <a href="addAdmin.php">
                        <i class="fa fa-user-plus"></i>
                        <span>add admin</span>
                    </a>
                </li>
                <li>
                    <a href="editAccount.php?a_id=<?= $row['adminID']?>">
                        <i class="fa fa-user-cog"></i>
                        <span>edit account</span>
                    </a>
                </li>
            <?php
                $userTye = $row['userType'];
                if ($userTye === 'seller'){
            ?>

                <li>
                    <a href="sellerStatus.php">
                        <i class="fa fa-check-square"></i>
                        <span>check seller status</span>
                    </a>
                </li>
            <?php } ?>
                <hr>
                <h5>customer info</h5>
                <hr>
                <li>
                    <a href="userRecords.php">
                        <i class="fa fa-folder-open"></i>
                        <span>user records</span>
                    </a>
                </li>
                <li>
                    <a href="userOrders.php">
                        <i class="fa fa-boxes"></i>
                        <span>Customer orders</span>
                    </a>
                </li>
                <li>
                    <a href="transaction.php">
                        <i class="fa fa-recycle"></i>
                        <span>transactions</span>
                    </a>
                </li>
                <hr>
                <h5>product info</h5>
                <li>
                    <a href="addProduct.php?a_id=<?= $row['adminID']?>">
                        <i class="fa fa-plus-square"></i>
                        <span>add products</span>
                    </a>
                </li>
                <li>
                    <a href="allProducts.php?a_id=<?= $row['adminID']?>">
                        <i class="fa fa-list-ul"></i>
                        <span>all products</span>
                    </a>
                </li>
                <hr>
                <div class="logout-btn">
                    <a href="../admin/logout.php">
                        <i class="fa fa-power-off"></i>
                        <span>logout</span>
                    </a>
                </div>
            </ul>
        </ul>
    </div>
</nav>