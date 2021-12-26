<?php

$title = ' SHOPPING CART';

include_once '../config.php';
global $connect;

include_once '_userHeader.php';

$userID = $_GET['benim'];

if (!isset($_SESSION['submit']) && !($userID) ){

    echo "<h2 class='loginErr'>you have not logged in. <a href='login-register.php'>click here to login</a></h2>";

}
else{
    include_once '_navLinks.php';



?>
    <div class="checkout-wrapper">
        <div class="checkout-container">

        <h4 class="text-center pt-3 text-uppercase text-warning fw-bolder">check out</h4>

        <form action="userOrder.php?benim=<?= $userID ?>" method="POST">

            <div class="checkout-left">
                    <h6>your order</h6>
                <table class="table table-striped">
                    <thead class="bg-warning text-capitalize">
                        <tr>
                            <th></th>
                            <th>product price</th>
                            <th>price</th>
                            <th>qty</th>
                            <th class="text-center">subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $fetch = mysqli_query($connect, "SELECT * FROM userorders WHERE userID = '$userID' ");

                            $num = mysqli_num_rows($fetch);

                            if ($num !== 0 ){

                                $grandTotal = 0;

                                while ($data = mysqli_fetch_assoc($fetch)){

                                    $grandTotal = $grandTotal + ($data['productQuantity'] * $data['productPrice']);
                        ?>
                        <tr>
                            <td>
                                <input type="hidden" name="productID[]" id="" value="<?= $data['productID'] ?>">
                                <input type="hidden" name="productImg" id="" value="<?= $data['productImg'] ?>">
                            </td>
                            <td class="text-capitalize">
                                <?= $data['productName'] ?>
                                <input type="hidden" name="productName" id="" value="<?= $data['productName'] ?>">
                            </td>
                            <td>
                                <?= $data['productPrice'] ?>
                                <input type="hidden" name="productPrice" id="" value="<?= $data['productPrice'] ?>">
                            </td>
                            <td>
                                <?= $data['productQuantity'] ?>
                                <input type="hidden" name="productQuantity" id="" value="<?= $data['productQuantity'] ?>">
                            </td>
                            <td>
                                <?= $data['totalPrice'] ?>
                                <input type="hidden" name="totalPrice" id="" value="<?= $data['totalPrice'] ?>">
                            </td>
                            <td>
                                <a href="delete.php?userID=<?= $userID?>&pro_id=<?= $data['productID'] ?> " class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="text-right text-uppercase text-warning fw-bold">main total</td>
                            <td colspan="2" class=""><?= number_format($grandTotal, 2) ?></td>
                            <input type="hidden" name="grandTotal" id="" value="<?= number_format($grandTotal, 2) ?>">
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <div class="col-12">
                                    <input type="submit" name="submit" value="place your order" class="btn btn-warning text-white text-uppercase font-weight-bold">
                                </div>
                            </td>
                        </tr>
                        <?php }else{ ?>
                         <tr>
                             <td colspan="6" class="text-uppercase text-center font-weight-bold py-3">you have no orders</td>
                         </tr>
                         <tr>
                             <td colspan="6">
                                 <a href="index.php?benim=<?= $userID ?>" class="btn btn-warning text-white font-weight-bold text-uppercase">
                                     <i class="fa fa-arrow-alt-circle-left"></i>
                                     back to shop
                                 </a>
                             </td>
                         </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="checkout-right">
                    <h6>shipping address</h6>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                            $query = mysqli_query($connect, "SELECT * FROM shipping WHERE userID = '$userID' ");

                            while ($row = mysqli_fetch_assoc($query)){
                        ?>
                            <div class="col-md-6 col-sm-12">
                                <label>first name <span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="firstName" id="" value="<?= $row['firstName'] ?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>last name <span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="lastName" id="" value="<?= $row['lastName'] ?>">
                            </div>
                            <div class="col-12">
                                <label>email<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="userEmail" id="" value="<?= $row['email'] ?>">
                            </div>
                            <div class="col-12">
                                <label>address<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="userAddress" id="" value="<?= $row['resAddress'] ?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>phone number<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="userPhone" id="" value="<?= $row['phoneNumber'] ?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>city<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="city" id="" value="<?= $row['city'] ?>">
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <label>country<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="country" id="" value="<?= $row['country'] ?>">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>

    </div>
    </div>

<?php

include_once "_userFooter.php";

}
?>
