<?php

$category = $_GET['category'];

$title = strtoupper(" ".$category);

include_once "../config.php";

global $connect;

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='../login.php'>click here to login</a></h2>";

}
else{

    $userID = $_GET['userID'];

    include_once "_header.php";

    ?>
    <!-- cloths start -->
    <?php
        if ($category === 'cloths' ){
    ?>
<div class="index-container">
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php

                    $query = mysqli_query($connect,"SELECT * FROM products WHERE productCategory = '$category' AND productUser = 'male'  ORDER BY rand() ");

                        while($row = mysqli_fetch_assoc($query)){
                ?>
                <!-- male -->
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="product-card">
                        <img src="../uploads/<?= $row['productImg'] ?>" alt="">
                        <div class="card-body">
                            <span>Category: <?= $row['productCategory'] ?></span>
                            <p><?= $row['productName'] ?></p>
                        </div>
                        <hr>
                        <div class="card-foot">
                            <h6>$<?= $row['productPrice'] ?>.00</h6>
                            <a href="singleProduct.php?pro_id=<?= $row['productID'] ?>" class="buttons">
                                <div class="fa fa-plus-circle"></div>
                                add
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- female -->
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php
                    $query = mysqli_query($connect,"SELECT * FROM products WHERE productCategory = '$category' AND productUser = 'female'  ORDER BY rand()");

                        while($row = mysqli_fetch_assoc($query)){
                ?>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="product-card">
                            <img src="../uploads/<?= $row['productImg'] ?>" alt="">
                            <div class="card-body">
                                <span>Category: <?= $row['productCategory'] ?></span>
                                <p><?= $row['productName'] ?></p>
                            </div>
                            <hr>
                            <div class="card-foot">
                                <h6>$<?= $row['productPrice'] ?>.00</h6>
                                <a href="singleProduct.php?pro_id=<?= $row['productID'] ?>" class="buttons">
                                    <div class="fa fa-plus-circle"></div>
                                    add
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }  ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
    <!-- cloths end -->

    <!-- shoes start -->
    <?php
    if ($category === 'shoes' ){
    ?>
<div class="index-container">
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php

                $query = mysqli_query($connect,"SELECT * FROM products WHERE productCategory = '$category' AND productUser = 'male'  ORDER BY rand() ");

                while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <!-- male -->
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="product-card">
                            <img src="../uploads/<?= $row['productImg'] ?>" alt="">
                            <div class="card-body">
                                <span>Category: <?= $row['productCategory'] ?></span>
                                <p><?= $row['productName'] ?></p>
                            </div>
                            <hr>
                            <div class="card-foot">
                                <h6>$<?= $row['productPrice'] ?>.00</h6>
                                <a href="singleProduct.php?pro_id=<?= $row['productID'] ?>" class="buttons">
                                    <div class="fa fa-plus-circle"></div>
                                    add
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <!-- female -->
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php
                $query = mysqli_query($connect,"SELECT * FROM products WHERE productCategory = '$category' AND productUser = 'female'  ORDER BY rand()");

                while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="product-card">
                            <img src="../uploads/<?= $row['productImg'] ?>" alt="">
                            <div class="card-body">
                                <span>Category: <?= $row['productCategory'] ?></span>
                                <p><?= $row['productName'] ?></p>
                            </div>
                            <hr>
                            <div class="card-foot">
                                <h6>$<?= $row['productPrice'] ?>.00</h6>
                                <a href="singleProduct.php?pro_id=<?= $row['productID'] ?>" class="buttons">
                                    <div class="fa fa-plus-circle"></div>
                                    add
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
    <!-- shoes end -->

    <!-- bags start -->
<?php
        if ($category === 'bags' ){
?>
<div class="index-container">
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php

                $query = mysqli_query($connect,"SELECT * FROM products WHERE productCategory = '$category' AND productUser = 'male'  ORDER BY rand() ");

                while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <!-- male -->
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="product-card">
                            <img src="../uploads/<?= $row['productImg'] ?>" alt="">
                            <div class="card-body">
                                <span>Category: <?= $row['productCategory'] ?></span>
                                <p><?= $row['productName'] ?></p>
                            </div>
                            <hr>
                            <div class="card-foot">
                                <h6>$<?= $row['productPrice'] ?>.00</h6>
                                <a href="singleProduct.php?pro_id=<?= $row['productID'] ?>" class="buttons">
                                    <div class="fa fa-plus-circle"></div>
                                    add
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <!-- female -->
    <div class="product">
        <div class="container-fluid">
            <div class="row">
                <?php
                $query = mysqli_query($connect,"SELECT * FROM products WHERE productCategory = '$category' AND productUser = 'female'  ORDER BY rand()");

                while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="product-card">
                            <img src="../uploads/<?= $row['productImg'] ?>" alt="">
                            <div class="card-body">
                                <span>Category: <?= $row['productCategory'] ?></span>
                                <p><?= $row['productName'] ?></p>
                            </div>
                            <hr>
                            <div class="card-foot">
                                <h6>$<?= $row['productPrice'] ?>.00</h6>
                                <a href="singleProduct.php?pro_id=<?= $row['productID'] ?>" class="buttons">
                                    <div class="fa fa-plus-circle"></div>
                                    add
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
    <!-- bags end -->
    <div class="index-footer"></div>
<?php
    include_once '_footer.php'; }
