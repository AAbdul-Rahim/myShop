<?php
$title = " SELLER STATUS";
include_once "../config.php";
include_once "_header.php";

global $connect;


if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";
}
else{
//
//    if(trim($_GET['userID']) !== '') {
//
//
//        $userID = $_GET['userID'];
//
//        $query = mysqli_query($connect, "SELECT * FROM users WHERE userID = '$userID' ");
//
//        $row = mysqli_fetch_assoc($query);
//
//    }
    if (isset($_POST['accept'])) {

        function check($data)
        {

            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            return $data;
        }

            $userID = check($_POST['userID']);
            $firstName = check($_POST['firstName']);
            $lastName = check($_POST['lastName']);
            $userPhone = check($_POST['userPhone']);
            $userEmail = check($_POST['userEmail']);
            $userType = check($_POST['userType']);

            $sellerStatus = 'active';

            $year = substr(date('Y') , 2);

            $sellerID = uniqid().substr($firstName, 0, 3).$year;

            $accept = mysqli_query($connect, "UPDATE users SET sellerID = '$sellerID', firstName = '$firstName', lastName = '$lastName', 
                 userEmail = '$userEmail', userType ='$userType',sellerStatus = '$sellerStatus',
                 userPhone = '$userPhone' WHERE userID = '$userID' ");

            if ($accept){
                echo "<script>alert('Seller Account Activated');</script>";
            }
            else{
                echo "<script>alert('An Error Occurred');</script>";
            }

    }
    elseif (isset($_POST['reject'])){

        function check($data)
        {

            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            return $data;
        }

        $userID = check($_POST['userID']);
        $firstName = check($_POST['firstName']);
        $lastName = check($_POST['lastName']);
        $userPhone = check($_POST['userPhone']);
        $userEmail = check($_POST['userEmail']);
        $userType = check($_POST['userType']);

        $sellerStatus = 'rejected';

        $reject = mysqli_query($connect, "UPDATE users SET firstName = '$firstName', lastName = '$lastName', 
                 userEmail = '$userEmail', userType ='$userType',sellerStatus = '$sellerStatus',
                 userPhone = '$userPhone' WHERE userID = '$userID' ");

        if ($reject){
            echo "<script>alert('Seller Account Rejected');</script>";
        }
        else{
            echo "<script>alert('An Error Occurred');</script>";
        }
    }

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
                <h2 class="main-title">activate seller account</h2>

                <div class="content-box">
                    <form action="" method="post">
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
                        $product = mysqli_query($connect, "SELECT * FROM users WHERE sellerStatus = 'pending' ");

                        while ($row = mysqli_fetch_array($product)){

                            extract($row);

                            ?>
                            <tr>
                                <td type="hidden">
                                    <input type="hidden" name="userID" id="" value="<?= $userID ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="firstName" value="<?= $firstName ?>" id="">
                                    <?= strtoupper($firstName); ?>
                                </td>
                                <td>
                                    <input type="hidden" name="lastName" value="<?= $lastName ?>" id="">
                                    <?= strtoupper($lastName); ?>
                                </td>
                                <td>
                                    <input type="hidden" name="userPhone" value="<?= $userPhone  ?>" id="">
                                    <?= $userPhone ?>
                                </td>
                                <td>
                                    <input type="hidden" name="userEmail" value="<?= $userEmail ?>" id="">
                                    <?= $userEmail ?>
                                </td>
                                <td>
                                    <input type="hidden" name="userType" value="<?= $userType ?>" id="">
                                    <?= ucfirst($userType); ?>
                                </td>
                                <td>
                                    <input type="submit" name="accept" class="btn btn-success text-uppercase" value="accept">
                                    <input type="submit" name="reject" class="btn btn-danger text-uppercase" value="reject">
                                </td>
                            </tr>
                        <?php
                            }
                        ?>

                        </tbody>
                    </table>
                    </form>
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


