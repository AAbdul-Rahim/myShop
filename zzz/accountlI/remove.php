<?php

$userID = $_GET['userID'];

include_once '../config.php';

//unset session after ordering all products
if (isset($_GET["action"])) {
    if ($_GET["action"]=="delete_all") {
        foreach ($_SESSION["cart"] as $keys => $values) {

            echo "<script>alert('Product Ordered Successfully');</script>";
            unset($_SESSION["cart"][$keys]);

            $userID = $_GET['userID'];

            echo "<script>window.location='userCheckout.php?userID=$userID'</script>";

        }
    }

}

//remove single product
if(isset($_GET["action"])) {
    if ($_GET["action"]=="delete_single") {
        foreach ($_SESSION["cart"] as $keys => $values) {

            if ($values["item_id"] == $_GET["pro_id"]) {

                echo "<script>alert('Product Ordered Successfully');</script>";
                unset($_SESSION["cart"][$keys]);

                $userID = $_GET['userID'];

                echo "<script>window.location='userCheckout.php?userID=$userID'</script>";
            }
        }
    }

}








