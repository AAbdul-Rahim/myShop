<?php



$userID = $_GET['benim'];

include_once '../config.php';

//unset session after ordering all products
if (isset($_GET["action"])) {
    if ($_GET["action"] == "remove_all") {
        foreach ($_SESSION["userCart"] as $keys => $values) {

            unset($_SESSION["userCart"][$keys]);

        }
        echo "<script>alert('Product Ordered Successfully');</script>";
        echo "<script>window.location='userCheckout.php?benim=$userID'</script>";
    }

}

//remove single product
if (isset($_GET["action"])) {
    if ($_GET["action"] == "remove_single") {
        foreach ($_SESSION["userCart"] as $keys => $values) {

            if ($values["item_id"] == $_GET["pro_id"]) {

                echo "<script>alert('Product Ordered Successfully');</script>";
                unset($_SESSION["userCart"][$keys]);

               echo "<script>window.location='userCheckout.php?benim=$userID'</script>";
            }
        }
    }

}


//// remove items from shopping cart
//if (isset($_GET["action"])) {
//    if ($_GET["action"]=="delete") {
//        foreach ($_SESSION["cart"] as $keys => $values) {
//
//            if ($values["item_id"]== $_GET["pro_id"]) {
//                unset($_SESSION["cart"][$keys]);
//                echo '<script>alert("item Removed")</script>';
//                echo "<script>window.location='userCart.php?benim=$userID' </script>";
//            }
//        }
//    }
//
//}








