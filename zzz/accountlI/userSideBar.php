<?php

    include_once "../config.php";
    global $connect;

    $query = mysqli_query($connect, "SELECT * FROM users WHERE lastName = '$_SESSION[userName]' ");

    $row = mysqli_fetch_assoc($query);
    $userType = $row['userType'];
    $sellerStatus = $row['sellerStatus'];

?>
<nav class="sidebar-wrapper">
    <div class="sidebar-header-wrapper">
        <!-- logo -->
        <div class="sidebar-logo"><a href="">my shop</a></div>
        <!-- toggle btn -->
        <div class="toggle-close toggle-btn">
            <i class="fa fa-times"></i>
        </div>
    </div>

    <!-- seller menu -->
    <?php
        if ($userType === 'seller' && $sellerStatus === 'active'){
    ?>
    <!-- side menus -->
    <div class="sidebar-menu-wrapper">
        <ul>
            <h5>seller account info</h5>
            <hr>
            <li>
                <a href="dashboard.php?benim=<?= $row['userID'] ?>">
                    <i class="fa fa-user"></i>
                    <span>account summary</span>
                </a>
            </li>
            <li>
                <a href="editUserAccount.php?benim=<?= $row['userID']?>">
                    <i class="fa fa-user-cog"></i>
                    <span>edit seller account</span>
                </a>
            </li>
            <li>
                <a href="shippingAddress.php?benim=<?= $row['userID']?>">
                    <i class="fa fa-truck-moving"></i>
                    <span>add shipping address</span>
                </a>
            </li>
            <li>
                <a href="editAddress.php?benim=<?= $row['userID']?>">
                    <i class="fa fa-truck-moving"></i>
                    <span>edit shipping address</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-boxes"></i>
                    <span>orders</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-boxes"></i>
                    <span>track orders</span>
                </a>
            </li>
            <hr>
            <h5>customer info</h5>
            <hr>
            <li>
                <a href="">
                    <i class="fa fa-folder-open"></i>
                    <span>user records</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-boxes"></i>
                    <span>orders</span>
                </a>
            </li>
            <hr>
            <h5>product info</h5>
            <li>
                <a href="../product/addProduct.php">
                    <i class="fa fa-plus-square"></i>
                    <span>add products</span>
                </a>
                </li>
            <li>
                <a href="allProducts.php">
                    <i class="fa fa-list-ul"></i>
                    <span>all products</span>
                </a>
            </li>
            <hr>
            <div class="logout-btn">
                <a href="../accountlI/logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>logout</span>
                </a>
            </div>
        </ul>
    </div>

    <!-- customer menu -->
    <?php
        }
        else{
    ?>
    <!-- side menus -->
    <div class="sidebar-menu-wrapper">
        <ul>
            <h5>user account info</h5>
            <hr>
            <li>
                    <a href="dashboard.php?benim=<?= $row['userID'] ?>">
                        <i class="fa fa-user"></i>
                        <span>account summary</span>
                    </a>
                </li>
            <li>
                <a href="editUserAccount.php?benim=<?= $row['userID']?>">
                    <i class="fa fa-user-cog"></i>
                    <span>edit user account</span>
                </a>
            </li>
            <li>
                <a href="shippingAddress.php?benim=<?= $row['userID']?>">
                    <i class="fa fa-truck-moving"></i>
                    <span>add shipping address</span>
                </a>
            </li>
            <li>
                <a href="editAddress.php?benim=<?= $row['userID']?>">
                    <i class="fa fa-truck-moving"></i>
                    <span>edit shipping address</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-boxes"></i>
                    <span>orders</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-boxes"></i>
                    <span>track orders</span>
                </a>
            </li>
            <hr>
            <?php if ($sellerStatus === 'pending'){ ?>
            <p>your request for seller account is pending activation</p>
            <div class="btn btn-warning text-white text-capitalize w-50" style="margin: .7em 20%;">
                <a href="index.php?benim=<?= $row['userID'] ?>" class="text-white">keeping shopping</a>
            </div>
            <hr>
            <?php }elseif ($sellerStatus === 'inactive'){  ?>
            <div class="btn btn-warning text-capitalize w-50" style="margin: .7em 20%;">
                <a href="seller.php?benim=<?= $row['userID'] ?>" class="text-white">become a seller</a>
            </div>
            <hr>
            <?php } ?>
            <div class="logout-btn">
                <a href="../accountlI/logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>logout</span>
                </a>
            </div>
        </ul>
    </div>
    <?php } ?>

</nav>


