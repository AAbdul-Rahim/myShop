<?php

$title = ' SINGLE PRODUCTS';

include_once '../config.php';
global $connect;

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='../login.php'>click here to login</a></h2>";

}
else{

    $userID = $_GET['benim'];

    include_once 'navLinks.php';

    $errors = [];

    if(trim($_GET['pro_id'] && $_GET['benim']) !== ''){

        $this_productID = trim($_GET['pro_id']);

        $userID = $_GET['userID'];

        $users = mysqli_query($connect, "SELECT * FROM users WHERE userID = '$userID' ");
        $sql = mysqli_fetch_assoc($users);

        $query = mysqli_query($connect, "SELECT * FROM products WHERE productID = '$this_productID' ");
        $row = mysqli_fetch_assoc($query);

        $image = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$this_productID' ");
        $data = mysqli_fetch_assoc($image);


    }


    if (isset($_POST["add_to_cart"]))
    {

        if(isset($_SESSION["cart"]))
        {
            $item_array_id = array_column($_SESSION["cart"], "item_id");

            if(!in_array($_GET["pro_id"], $item_array_id))
            {
                $count = count($_SESSION["cart"]);

                $item_array = array(
                    'item_id' => $_GET['pro_id'],
                    'userID' => $_POST['userID'],
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'phoneNumber' => $_POST['phoneNumber'],
                    'email' => $_POST['email'],
                    'productID' => $_POST['productID'],
                    'productImg' => $_POST['productImg'],
                    'productName' => $_POST['productName'],
                    'productQuantity' => $_POST['productQuantity'],
                    'productPrice' => $_POST['productPrice']
                );
                $_SESSION["cart"][$count] = $item_array;
                echo "<script>alert('Item Added to Cart')</script>";
                echo "<script>window.location='index.php?benim=$userID' </script>";
            }
            else
            {
                echo "<script>alert('Item Already Added')</script>";
                echo "<script>window.location='index.php?benim=$userID'</script>";
            }
        }
        else
        {

            $item_array = array(
                'item_id' => $_GET['pro_id'],
                'userID' => $_POST['userID'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'phoneNumber' => $_POST['phoneNumber'],
                'email' => $_POST['email'],
                'productID' => $_POST['productID'],
                'productImg' => $_POST['productImg'],
                'productName' => $_POST['productName'],
                'productQuantity' => $_POST['productQuantity'],
                'productPrice' => $_POST['productPrice']

            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    // remove items from shopping cart
    if (isset($_GET["action"])) {
        if ($_GET["action"]=="delete") {
            foreach ($_SESSION["cart"] as $keys => $values) {

                if ($values["item_id"]== $_GET["pro_id"]) {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("item Removed")</script>';
                    echo "<script>window.location='userCart.php?benim=$userID' </script>";
                }
            }
        }

    }


    ?>


    <div class="single_product_bg">
        <div class="container-fluid">

            <form action="singleProduct.php?action=add&pro_id=<?= $row['productID'] ?>&benim=<?= $userID?>" method="POST">

                <div class="row">
                    <!-- left col  -->
                    <div class="col-md-6 single-left">
                        <img src="../uploads/<?= $data['productImg'] ?>" alt="">
                    </div>

                    <!-- right col -->
                    <div class="col-md-6 single-right">
                        <hr>
                        <h3><?= $row['productName']  ?></h3>
                        <h6>Category:&nbsp;<?= $row['productCat'] ?></h6>
                        <h6>User:&nbsp;<?= $row['productUser'] ?></h6>
                        <h6>ID:&nbsp;<?= $row['productID'] ?></h6>

                        <h4>$<?= $row['productPrice'] ?>.00</h4>
                        <input type="number" class="single_field" name="productQuantity" value="1" min="1">
                        <input type="hidden" name="userID" value="<?= $userID ?>">
                        <input type="hidden" name="email" value="<?= $sql['userEmail'] ?>">
                        <input type="hidden" name="firstName" value="<?= $sql['firstName'] ?>">
                        <input type="hidden" name="lastName" value="<?= $sql['lastName'] ?>">
                        <input type="hidden" name="phoneNumber" value="<?= $sql['userPhone'] ?>">
                        <input type="hidden" name="productID" value="<?= $row['productID'] ?>">
                        <input type="hidden" name="productImg" value="<?= $data['productImg'] ?>" alt="">
                        <input type="hidden" name="productName" value="<?= $row['productName'] ?>">
                        <input type="hidden" name="productPrice" value="<?= $row['productPrice'] ?>">

                        <button type="submit" name="add_to_cart" class="buttons btn2">
                            <i class="fa fa-shopping-basket mr-1"></i>
                            add to cart
                        </button>
                    </div>
                </div>
            </form>

            <!-- product desc -->
            <div class="row mt-5">
                <div class="col product_desc">
                    <hr>
                    <h5>description</h5>
                    <p><?= $row['productDesc'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="index-footer"></div>
    <?php

    include_once '_footer.php';
}
?>