<?php

    include_once "../config.php";
    include_once "_userHeader.php";

    global $connect;


?>
<header class="header-wrapper">
    <nav class="navbar navbar-expand-lg navBar-wrapper">
        <!--        toggle-->
        <div class="navbar-toggler toggle-btn"  data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </div>
        <!--        logo -->
        <div class="navbar-brand logo"><a href="../index.php">my shop</a></div>
        <!-- cart icon -->
        <?php
        if (!isset($_SESSION['userName']))
        {
        ?>
            <!-- nav menus -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarColor01">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">
                            <span class="fa fa-home"></span>
                            Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login-register.php">
                            <span class="fa fa-users"></span>
                            login/register
                        </a>
                    </li>
                </ul>
            </div>
        <?php
            }else{

                $result = mysqli_query($connect, "SELECT * FROM users WHERE lastName = '$_SESSION[userName]' ");

                $row = mysqli_fetch_assoc($result);

                extract($row);

        ?>
            <div class="cart-icon order-md-last">
                <?php

                    if(!empty($_SESSION["cart"])) {

                    $cart_count = count(array_keys($_SESSION["cart"]));
                ?>

                <a href="userCart.php?benim=<?= $userID ?>" name="proceed">
                    <i class="fa fa-shopping-bag"></i>
                    <span><?php echo $cart_count;?></span>
                </a>
                <?php

                    }
                    else {

                ?>
                    <a href="userCart.php?benim=<?= $userID ?>" name="proceed">
                        <i class="fa fa-shopping-bag"></i>
                        <span><?php echo 0?></span>
                    </a>
                <?php
                    }
                ?>
        </div>
            <!-- nav menus -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarColor01">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?benim=<?= $userID ?>">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">category</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                    <?php if($sellerStatus === 'inactive' ){ ?>
                    <li class="nav-item btn1">
                        <a class="nav-link" href="seller.php?benim=<?= $userID ?>">become a seller</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        <!-- nav menus -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarColor01">
            <ul class="navbar-nav">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        hi,
                        <?= $_SESSION['userName'] ?>
                    </a>
                    <div class="dropdown-menu mini-menus">
                        <a class="dropdown-item mini-menus-links" href="dashboard.php?benim=<?= $userID ?>"><i class="fa fa-user"></i>account</a>
                        <a class="dropdown-item mini-menus-links" href="#"><i class="fa fa-shopping-bag"></i>check out</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item mini-menus-links" href="logout.php"><i class="fa fa-power-off"></i>logout</a>
                    </div>
                </li>
            </ul>
        </div>

        <?php
            }
        ?>
    </nav>
</header>