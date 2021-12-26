<?php
$title = " ALL PRODUCT";
include_once "../config.php";
include_once "_header.php";

global $connect;


if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";
}
else{

    $adminID = $_GET['a_id'];

    $query = mysqli_query($connect, "SELECT * FROM admin WHERE adminID = '$adminID' ");

    $row = mysqli_fetch_assoc($query);

    $sellerID = $row['sellerID'];
?>
    <link rel="stylesheet" href="../css/datatables.css">
<div class="dashboard-wrapper">
    <!-- side bar -->
    <?php include_once "sidebar.php"; ?>

    <!-- content -->
    <div class="content-wrapper">

        <!-- header -->
        <?php include_once "content-header.php"; ?>

        <!-- main content -->
        <div class="main-content-wrapper">
            <h2 class="main-title">all products</h2>

            <div class="content-box">
                <table class="table table-hover" id="products_table">
                    <thead class="text-warning text-uppercase text-center bg-secondary">
                        <tr>
                            <th></th>
                            <th>image</th>
                            <th>name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $product = mysqli_query($connect, "SELECT * FROM products WHERE sellerID = '$sellerID' ");

                        while ($row = mysqli_fetch_array($product)){

                            extract($row);

                            $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                            $data = mysqli_fetch_assoc($images);

                                extract($data);
                    ?>
                        <tr>
                            <td type="hidden">
                                <input type="hidden" id="" value="<?= $productID ?>">
                            </td>
                            <td><img src="../uploads/<?= $productImg; ?>" alt="" style="width: 4em;height: 3em"></td>
                            <td><?= $productName ?></td>
                            <td><?= $productPrice ?></td>
                            <td><?= $productQty ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_product<?php echo $row['productID'] ?>">Update</button>
                                <a  class="btn btn-danger text-capitalize" onClick="javascript: return confirm('Do You Want To Continue');" href="delete.php?itemID=<?= $row['productID']; ?>">Remove</a>
                            </td>
                        </tr>
                        <?php
                        include "productUpdate.php";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- overlay -->
    <div class="overlay"></div>
</div>


<?php }

include_once "_footer.php";
?>
<script src="../js/datatables.js"></script>
<script src="../js/productTableFunc.js" ></script>


