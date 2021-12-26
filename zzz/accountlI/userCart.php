<?php

$title = ' SHOPPING CART';

include_once '../config.php';
global $connect;

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

}
else{

    $userID = $_GET['benim'];

include_once 'navLinks.php';


?>


    <div class="main-wrapper">
        <div class="cart-container" style="padding-top: 8em;width: 90%;margin: auto;">
            <form action="userOrder.php?benim=<?= $userID ?>" method="post">
                <table class="table table-bordered bg-white">
                    <thead class="bg-warning text-capitalize text-white text-center">
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
                    if(!empty($_SESSION["cart"]) ){


                        $total = 0;

                        foreach ($_SESSION["cart"] as $keys => $values) {

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
                                    <a class="btn btn-success text-uppercase" href="userOrder.php?action=view&pro_id=<?php echo $values['item_id']; ?>&userID=<?= $userID ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                        order
                                    </a>
                                    <a class="btn btn-danger text-uppercase" href="singleProduct.php?action=delete&pro_id=<?php echo  $values['item_id'];?>&userID=<?= $userID ?>">
                                        <i class="fa fa-trash"></i>
                                        delete
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
    </div>

    <?php
    include_once "_userFooter.php";

}
?>
