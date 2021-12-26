<?php

$title = ' SHOPPING CART';
include_once "usersizNavigation.php";
include_once '../config.php';

global $connect;



    ?>

    <div class="index-container">
        <div class="cart-container">
            <form action="checkOut.php" method="post">
            <table class="table table-bordered mt-5">
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
                                <img src="uploads/<?= $values['productImg'] ?>" alt="product image">
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
                                <a class="btn btn-success text-uppercase" href="checkOut.php?action=view&pro_id=<?php echo $values['item_id']; ?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    order
                                </a>
                                <a class="btn btn-danger text-uppercase" href="singleProduct.php?action=delete&pro_id=<?php echo  $values['item_id'];?>">
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
                            <a href="../index.php" class="btn btn-warning text-uppercase text-white" >
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
    include_once "_usersizFooter.php";


?>
