<?php
    include_once "config.php";
    include_once "_header.php";

?>
<header class="header-wrapper">
    <nav class="navbar navbar-expand-lg navBar-wrapper">
        <!--        toggle-->
        <div class="navbar-toggler toggle-btn"  data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </div>
        <!--        logo -->
        <div class="navbar-brand logo"><a href="index.php">my shop</a></div>
        <!-- cart icon -->
        <div class="cart-icon order-md-last">
            <?php

            if(!empty($_SESSION["cart"])) {

                $cart_count = count(array_keys($_SESSION["cart"]));
                ?>

                <a href="accountsiz/cart.php" name="proceed">
                    <i class="fa fa-shopping-bag"></i>
                    <span><?php echo $cart_count;?></span>
                </a>
                <?php

            }
            else {
                ?>
                <a href="accountsiz/cart.php" name="proceed">
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
                        <a class="nav-link active" href="index.php">Home
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?#about-us">about us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?#contact-us">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="uwc/login-register.php">login/register</a>
                    </li>
                    <li class="nav-item btn1">
                        <a class="nav-link" href="uwc/login-register.php">become a seller</a>
                    </li>
                </ul>
        </div>
    </nav>
</header>
