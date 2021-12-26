<?php

$title = ' SHOPPING CART';

include_once '../config.php';
global $connect;

include_once "_userHeader.php";

$userID = $_GET['benim'];

if (!isset($_SESSION['submit']) && !($userID) ){

    echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

}
else{

    include_once '_navLinks.php';

    if (isset($_GET["action"])) {

        if ($_GET["action"] === "delete") {

            $productID = trim($_GET['pro_id']);

            $delete = mysqli_query($connect, "DELETE FROM cart WHERE productID = '$productID' AND userID = '$userID' ");

            if ($delete) {
                echo '<script>alert("Item Removed From Cart")</script>';
                echo "<script>window.location='userCart.php?benim=$userID' </script>";
            }
        }

    }


// remove items from shopping cart
    if (isset($_GET["action"])) {
        if ($_GET["action"] === "remove") {
            foreach ($_SESSION["userCart"] as $keys => $values) {

                if ($values["item_id"] == $_GET["pro_id"]) {
                    unset($_SESSION["userCart"][$keys]);
                    echo '<script>alert("Product Removed From Cart")</script>';
                    echo "<script>window.location='userCart.php?benim=$userID' </script>";
                }
            }
        }

    }

?>


    <div class="cart-container">
            <form action="userOrder.php?benim=<?= $userID ?>" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>image</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php
                    if(!empty($_SESSION["userCart"]) ){


                        $total = 0;

                        foreach ($_SESSION["userCart"] as $keys => $values) {

                            $_SESSION['productID'] = $values['productID'];
                            ?>

                            <tr>
                                <td>
                                    <input type="hidden" name="productID" value="<?= $values['productID'] ?>">
                                </td>
                                <td>
                                    <img src="../uploads/<?= $values['productImg'] ?>" alt="product image">
                                </td>
                                <td>
                                    <?= $values['productName'] ?>
                                </td>
                                <td>
                                    <?= $values['productPrice']; ?>
                                </td>
                                <td>
                                    <?= $values['productQuantity']; ?>
                                </td>

                                <td>
                                    <?=  number_format($values['productQuantity'] * $values["productPrice"] ,2);?>
                                </td>
                                <td>
                                    <a class="btn btn-success text-uppercase" href="userOrder.php?action=single&pro_id=<?php echo $values['item_id']; ?>&benim=<?= $userID ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                        order
                                    </a>
                                    <a class="btn btn-danger text-uppercase" href="userCart.php?action=remove&pro_id=<?php echo  $values['item_id'];?>&benim=<?= $userID ?>">
                                        <i class="fa fa-trash"></i>
                                        remove
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>

                        <tr>
                            <td colspan="6"></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-warning font-weight-bold text-uppercase text-white">order all</button>
                            </td>
                        </tr>
                        <?php
                    }
                    else{

                        ?>

                        <tr>
                            <td colspan='6' class="empty">Your Cart is Empty</td>
                        </tr>

                        <tr>
                            <td colspan="6" >
                                <a href="index.php?benim=<?= $userID ?>" class="btn btn-warning text-uppercase text-white" >
                                    <i class="fa fa-arrow-alt-circle-left"></i>
                                    back to shop
                                </a>
                            </td>
                            <td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </form>
        </div>

    <?php
    include_once "_userFooter.php";

}
?>
