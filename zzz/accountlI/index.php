<?php

    $title = " WELCOME";

    include_once "../config.php";

    global $connect;

    if (!isset($_SESSION['submit'])){

        echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

    }
    else{
            include_once "navLinks.php";
            $userID = $_GET['benim'];


?>
<div class="main-wrapper">

            <!-- carousel -->
            <div id="carouselExampleCaptions" class="carousel slide slider-wrapper" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slide-img slider-1"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-img slider-2"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-img slider-3"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-img slider-4"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                    <!--            <span class="visually-hidden">Previous</span>-->
                    <i class="fa fa-chevron-left prev-icon"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                    <!--            <span class="visually-hidden">Next</span>-->
                    <i class="fa fa-chevron-right next-icon"></i>
                </button>
            </div>

            <!-- category section -->
            <section class="category-section">
                <h6 class="header">shop by category</h6>
                <span class="line"></span>
                <div class="category-section-wrapper">
                    <!-- first half -->
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-laptop"></i>
                            <span>computer</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-keyboard"></i>
                            <span>computer accessories</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-briefcase"></i>
                            <span>bags</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-tv"></i>
                            <span>electronics</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-tablet"></i>
                            <span>phones & tablets</span>
                        </a>
                    </div>
                    <!-- second half -->
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-headphones-alt"></i>
                            <span>phones & tablets accessories</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-tshirt"></i>
                            <span>cloths</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-socks"></i>
                            <span>fashion accessories</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-shoe-prints"></i>
                            <span>shoes</span>
                        </a>
                    </div>
                    <div class="cat-section-mini-cards">
                        <a class="cat-section-overlay" href="">
                            <i class="fa fa-ad"></i>
                            <span>others</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- first banner -->
            <div class="banner-one-wrapper">
                <div class="banner-one-content"></div>
            </div>

            <!-- new arrival and featured products -->
            <div class="product-section">
                <!-- switch btn categories -->
                <div class="tab-wrapper">
                    <button class="tab-btn1" onclick="openCategory1(event, 'new')">new arrivals </button>
                    <button class="tab-btn1" onclick="openCategory1(event, 'featured')">featured products</button>
                </div>
                <div id="new" class="tab-contents1" style="display:block;">
                    <!-- new arrival -->
                    <div class="fashion-wrapper">
                        <div class="header-two">
                            <h6 class="">new arrivals</h6>
                            <p>browser through out latest products</p>
                        </div>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE new = 'new' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <div class="banner">new</div>
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- featured products -->
                <div id="featured" class="tab-contents1">
                    <div class="fashion-wrapper">
                        <div class="header-two">
                            <h6 class="">featured products</h6>
                            <p>Our most popular products based on sales</p>
                        </div>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE feature = 'featured' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <div class="banner1">featured</div>
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- second banner -->
            <div class="banner-one-wrapper">
                <div class="banner-two-content"></div>
            </div>

            <!-- our shop -->
            <div class="product-section">
                <div class="header-two">
                    <h6 class="">our shop</h6>
                    <p>Our most popular products based on sales</p>
                </div>
                <!-- switch btn categories -->
                <div class="tab-wrapper">
                    <button class="tab-btn" onclick="openCategory(event, 'fashion')">fashion</button>
                    <button class="tab-btn" onclick="openCategory(event, 'electronics')">electronics</button>
                </div>
                <!-- fashion -->
                <div id="fashion" class="tab-contents" style="display:block;">
                    <!-- cloths -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">cloths</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'cloths' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- shoes -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">shoes</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'shoes' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- bags -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">bags</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'bags' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- accessories -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">accessories</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'fashion-access' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- electronics -->
                <div id="electronics" class="tab-contents">
                    <!-- phones -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">phones</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'phone-tablet' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- phone accessories -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">phone accessories</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'phone-tablet-access' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- computer -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">computers</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'computer' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- computer accessories -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">computer accessories</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'computer-access' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- home appliance -->
                    <div class="fashion-wrapper">
                        <h4 class="mini-title">home appliance</h4>
                        <div class="container-fluid">
                            <div class="row mx-auto owl-carousel owl-theme mb-5 pb-2">
                                <?php
                                $product = mysqli_query($connect, "SELECT * FROM products WHERE productCat = 'electronics' order by RAND() LIMIT 6  ");

                                while ($row = mysqli_fetch_array($product)){

                                    extract($row);

                                    $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                                    $data = mysqli_fetch_assoc($images);

                                    extract($data);
                                    ?>
                                    <div class="col product-card">
                                        <div class="product-img">
                                            <img src="../uploads/<?= $productImg ?>" alt=""
                                                 class="img-fluid d-block mx-auto">
                                            <div class="row btns w-100 mx-auto text-center">
                                                <a href="singleProduct.php?pro_id=<?= $productID ?>&&benim=<?= $userID ?>" class="col-12 py-2">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info p-3">
                                            <h6>category: <?= $productCat ?></h6>
                                            <h4><?= $productName ?></h4>
                                            <p>$<?= $productPrice ?>.00</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- third banner -->
            <div class="banner-one-wrapper">
                <div class="banner-three-content"></div>
            </div>
        </div>
<?php
    include_once "_userFooter.php";
    }
?>
