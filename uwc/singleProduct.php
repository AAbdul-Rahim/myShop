<?php

$title = ' SINGLE PRODUCTS';

include_once '../config.php';
global $connect;

include_once "_userHeader.php";

$userID = $_GET['benim'];

if (!isset($_SESSION['submit']) && !($userID) ){

    echo "<h2 class='loginErr'>you have not logged in. <a href='../login.php'>click here to login</a></h2>";

}
else{

    $userID = $_GET['benim'];

    include_once '_navLinks.php';

    $errors = [];

    if(trim($_GET['pro_id'] && $_GET['benim']) !== ''){

        $this_productID = trim($_GET['pro_id']);

        $userID = $_GET['benim'];

        $users = mysqli_query($connect, "SELECT * FROM shipping WHERE userID = '$userID' ");
        $sql = mysqli_fetch_assoc($users);

        $query = mysqli_query($connect, "SELECT * FROM products WHERE productID = '$this_productID' ");
        $row = mysqli_fetch_assoc($query);

        $image = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$this_productID' ");
        $data = mysqli_fetch_assoc($image);


    }

    if (isset($_POST["add_to_cart"]))
    {

        if(isset($_SESSION["userCart"]))
        {
            $item_array_id = array_column($_SESSION["userCart"], "item_id");

            if(!in_array($_GET["pro_id"], $item_array_id))
            {
                $count = count($_SESSION["userCart"]);

                $item_array = array(
                    'item_id' => $_GET['pro_id'],
                    'userID' => $_POST['userID'],
                    'productID' => $_POST['productID'],
                    'productImg' => $_POST['productImg'],
                    'productName' => $_POST['productName'],
                    'productQuantity' => $_POST['productQuantity'],
                    'productPrice' => $_POST['productPrice']
                );
                $_SESSION["userCart"][$count] = $item_array;
                //echo "<script>alert('Item Added to Cart')</script>";
                array_push($errors, "item added to cart");
                echo "<script>window.location='index.php?benim=$userID' </script>";
                //header("Location: index.php?benim=$userID");

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
                'productID' => $_POST['productID'],
                'productImg' => $_POST['productImg'],
                'productName' => $_POST['productName'],
                'productQuantity' => $_POST['productQuantity'],
                'productPrice' => $_POST['productPrice']

            );
            $_SESSION["userCart"][0] = $item_array;
        }
    }

//    if (isset($_POST["add_to_cart"]))
//    {
//        function check($data){
//
//            $data = htmlentities($data);
//            $data = htmlspecialchars($data);
//            $data = stripslashes($data);
//            return $data;
//        }
//
//        $userID = check($_POST['userID']);
//        $sellerID = check($_POST['sellerID']);
//        $productID = check($_POST['productID']);
//        $productImg = check($_POST['productImg']);
//        $productName = check($_POST['productName']);
//        $productPrice = check($_POST['productPrice']);
//        $productQty = check($_POST['productQty']);
//
//        $query = mysqli_query($connect, "SELECT * FROM cart WHERE productID = '$productID' ");
//        $num = mysqli_num_rows($query);
//
//        if ($num === 1){
//
//            echo "<script>alert('Product Already Added To Cart')</script>";
//            echo "<script>window.location='index.php?benim=$userID'</script>";
//
//        }else {
//
//            $insert = mysqli_query($connect, "INSERT INTO cart(userID,sellerID,productID,productImg,productName,productPrice,productQty)
//            VALUE('$userID','$sellerID','$productID','$productImg','$productName','$productPrice','$productQty') ");
//
//            if ($insert){
//                echo "<script>alert('Product Added To Cart')</script>";
//                echo "<script>window.location='index.php?benim=$userID'</script>";
//            }
//            else{
//                echo "<script>alert('An Error Occurred Try Again')</script>";
//            }
//
//        }
//
//    }



    ?>

    <div class="col-12 fixed-bottom">
        <ul class="fail-error">
            <?php  foreach($errors as $error){ ?>
                <li>
                    <?= $error ?>
                </li>
            <?php } ?>
        </ul>
    </div>
<div class="single-product-wrapper">

    <div class="single-product-bg">

        <div class="container-fluid">

                <div class="row">
                    <!-- left col  -->
                    <div class="col-md-6  single-left">
                        <img src="../uploads/<?= $data['productImg'] ?>" alt="">
                    </div>

                    <!-- right col -->
                    <div class="col-md-6 single-right">
                        <h2><?= $row['productName']  ?></h2>
                        <hr>
                        <h6>Category:&nbsp;<?= $row['productCat'] ?></h6>
                        <h6>ID:&nbsp;<?= $row['productID'] ?></h6>

                        <h4>$<?= $row['productPrice'] ?>.00</h4>
                        <form action="" method="POST">
                            <input type="number" class="single_field" name="productQuantity" value="1" min="1">
                            <input type="hidden" name="userID" value="<?= $userID ?>">
                            <input type="hidden" name="sellerID" value="<?= $row['sellerID'] ?>">
                            <input type="hidden" name="productID" value="<?= $row['productID'] ?>">
                            <input type="hidden" name="productImg" value="<?= $data['productImg'] ?>" alt="">
                            <input type="hidden" name="productName" value="<?= $row['productName'] ?>">
                            <input type="hidden" name="productPrice" value="<?= $row['productPrice'] ?>">

                            <button type="submit" name="add_to_cart" class="buttons mt-3" id="formSubmit">
                                <i class="fa fa-shopping-basket mr-1"></i>
                                add to cart
                            </button>
                        </form>
                    </div>
                </div>


            <!-- product desc -->
            <div class="row mt-5">
                <hr>
                <div class="col product_desc">

                    <h5>description</h5>
                    <p><?= $row['productDesc'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="sell-details-wrapper"></div>
</div>

<?php

    include_once '_userFooter.php';
}
?>