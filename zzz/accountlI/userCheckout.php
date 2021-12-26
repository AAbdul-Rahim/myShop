<?php

$title = ' SHOPPING CART';

include_once '../config.php';
global $connect;

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='../login.php'>click here to login</a></h2>";

}
else{

$userID = $_GET['userID'];

include_once '_header.php';


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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                            $fetch = mysqli_query($connect, "SELECT * FROM userorders WHERE userID = '$userID' ");

                            $num = mysqli_num_rows($fetch);

                            if ($num !== 0 ){

                                $total = 0;

                                while ($data = mysqli_fetch_assoc($fetch)){

                             $total = $total + ($data['productQuantity'] * $data['productPrice']);
                        ?>
                        <tr>
                            <td></td>
                            <td class="text-uppercase"><?= $data['productName'] ?></td>
                            <td><?= $data['productPrice'] ?></td>
                            <td><?= $data['productQuantity'] ?></td>
                            <td><?= number_format($data['productPrice'] * $data['productQuantity'] , 2) ?></td>
                            <td>
                                <a href="delete.php?userID=<?= $userID?>&pro_id=<?= $data['productID'] ?> " class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" class="text-right text-uppercase font-weight-bold">total</td>
                            <td><?= number_format($total, 2) ?></td>
                        </tr>
                        <?php }else{ ?>
                         <tr>
                             <td colspan="6" class="text-uppercase text-center font-weight-bold py-3">you have no orders</td>
                         </tr>
                         <tr>
                             <td colspan="6">
                                 <a href="index.php?userID=<?= $userID ?>" class="btn btn-warning text-white font-weight-bold text-uppercase">
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
                                $query = mysqli_query($connect, "SELECT * FROM shippingaddress WHERE userID = '$userID' ");

                                while ($row = mysqli_fetch_assoc($query)){
                            ?>
                            <div class="col-sm-12">
                                <input type="hidden" name="userID" id="" value="<?= $userID ?>">
                            </div>
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
                                <input type="text" name="userEmail" id="" value="<?= $row['userEmail'] ?>">
                            </div>
                            <div class="col-12">
                                <label>address<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="userAddress" id="" value="<?= $row['resAddress'] ?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>phone number<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="userPhone" id="" value="<?= $row['userPhone'] ?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>city<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="city" id="" value="<?= $row['city'] ?>">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>region<span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" name="region" id="" value="<?= $row['region'] ?>">
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


    <div class="index-footer"></div>
<?php

include_once "_footer.php";

}
?>
<script src="../js/dashboardToggleFunction.js"></script>
