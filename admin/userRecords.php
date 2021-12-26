<?php
$title = " USERS RECORD";
include_once "../config.php";
include_once "_header.php";

global $connect;


if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";
}
else{
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
                <h2 class="main-title">users record</h2>

                <div class="content-box">
                    <table class="table table-hover" id="products_table">
                        <thead class="text-warning text-uppercase text-center bg-secondary">
                        <tr>
                            <th></th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>contact</th>
                            <th>email</th>
                            <th>user type</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $product = mysqli_query($connect, "SELECT * FROM users");

                        while ($row = mysqli_fetch_array($product)){

                            extract($row);

                            ?>
                            <tr>
                                <td type="hidden">
                                    <input type="hidden" id="" value="<?= $userID ?>">
                                </td>
                                <td><?= strtoupper($firstName); ?></td>
                                <td><?= strtoupper($lastName); ?></td>
                                <td><?= $userPhone ?></td>
                                <td><?= $userEmail ?></td>
                                <td><?= ucfirst($userType); ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_product<?php echo $row['userID'] ?>">Update</button>
                                    <a  class="btn btn-danger text-capitalize" onClick="javascript: return confirm('Do You Want To Continue');" href="delete.php?itemID=<?= $row['userID']; ?>">Remove</a>
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

