<?php

$title = ' CHECK OUT';
include_once "_header.php";

include_once 'config.php';
global $connect;


?>
<div class="index-container">
    <div class="checkout-container">
        <h4 class="text-center text-uppercase font-weight-bold mb-4">check out</h4>

        <form action="order.php" method="POST">

            <div class="checkout-left">
                <h6>your order</h6>
                <table class="table table-bordered">
                    <thead class="bg-warning text-capitalize">
                        <tr>
                            <th></th>
                            <th>product price</th>
                            <th>price</th>
                            <th>qty</th>
                            <th class="text-center">subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_POST['submit'])){

                                $total = 0;
                                foreach ($_SESSION['cart'] as $values ){
                        ?>
                        <tr>
                            <td><input type="hidden" name="pro_id[]" id="" value="<?=  $values['productID'] ?>"></td>
                            <td><?= $values['productName'];?></td>
                            <td><?= $values['productPrice'];?></td>
                            <td><?= $values['productQuantity'];?></td>
                            <td class="text-center"><?=  "$".number_format($values['productQuantity'] * $values["productPrice"] ,2);?></td>
                        </tr>
                        <?php
                                    $total = $total + ($values['productQuantity'] * $values["productPrice"]);
                        }

                        ?>
                         <tr>
                             <td colspan="4" class="text-uppercase font-weight-bold text-right">total</td>
                             <td class="text-center font-weight-bold"><?= number_format($total, 2) ?> </td>
                         </tr>
                         <tr>
                             <td colspan="4"></td>
                             <td>
                                <div class="col-12">
                                    <input type="submit" name="submit" value="place your order" class="btn btn-warning text-white text-uppercase font-weight-bold">
                                </div>
                             </td>
                         </tr>
                        <?php
                                }
                            elseif ($_GET['action'] === 'view'){

                                    $singleTotal = 0;
                                foreach($_SESSION["cart"] as $values) {

                                    if ($values['item_id'] == $_GET['pro_id']) {
                        ?>
                         <tr>
                             <td><input type="hidden" name="pro_id[]" id="" value="<?=  $values['productID'] ?>"></td>
                             <td><?= $values['productName'];?></td>
                             <td><?= $values['productPrice'];?></td>
                             <td><?= $values['productQuantity'];?></td>
                             <td class="text-center"><?=  "$".number_format($values['productQuantity'] * $values["productPrice"] ,2);?></td>
                         </tr>
                         <tr>
                             <td colspan="4" class="text-uppercase font-weight-bold text-right">total</td>
                             <td class="text-center font-weight-bold"><?=  "$".number_format($values['productQuantity'] * $values["productPrice"] ,2);?></td>
                         </tr>
                         <tr>
                             <td colspan="4"></td>
                             <td>
                                 <a class="btn btn-warning text-uppercase text-white font-weight-bold" href="order.php?action=view&pro_id=<?php echo $values['item_id']; ?>">
                                     place your order
                                 </a>
                             </td>
                         </tr>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="checkout-right">
                <h6>shipping address</h6>
                <div class="container-fluid">
<!--                <div class="row">-->
<!--                    <div class="col-md-6 col-sm-12">-->
<!--                        <label>first name <span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="firstName" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-12">-->
<!--                        <label>last name <span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="lastName" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-12">-->
<!--                        <label>email<span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="userEmail" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-12">-->
<!--                        <label>address<span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="userAddress" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-12">-->
<!--                        <label>phone number<span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="userPhone" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-12">-->
<!--                        <label>city<span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="city" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-12">-->
<!--                        <label>region<span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="region" id="" required>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-12">-->
<!--                        <label>country<span class="font-weight-bold text-danger">*</span></label>-->
<!--                        <input type="text" name="country" id="" required>-->
<!--                    </div>-->

                </div>
            </div>
        </form>
    </div>
</div>



<div class="index-footer"></div>
<?php

include_once "_footer.php";


?>
<script src="js/dashboardToggleFunction.js"></script>
