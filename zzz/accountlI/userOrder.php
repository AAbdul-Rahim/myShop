<?php

include_once '../config.php';

global $connect;

$userID = $_GET['benim'];






if (isset($_POST['submit'])) {

    $userID;




    foreach($_SESSION["cart"] as $values) {

        $productID = $values['productID'];
        $productImg = $values['productImg'];
        $productName = $values['productName'];
        $productQuantity = $values['productQuantity'];
        $productPrice = $values['productPrice'];
        $totalPrice = number_format($values['productQuantity'] * $values['productPrice'], 2);
        $transactionID = substr($productName, 0, 3) . uniqid();

        $transactionStatus = 'pending';

        $query = mysqli_query($connect, "INSERT INTO userorders(userID,transactionID,productID,productImg,productName,productPrice,productQuantity,totalPrice,transactionStatus)
                VALUES('$userID','$transactionID','$productID','$productImg','$productName','$productPrice','$productQuantity','$totalPrice','$transactionStatus') ");

        if ($query) {

            echo "<script>window.location = 'remove.php?action=delete_all&userID=$userID'</script>";

        }
        else {
            echo "<script>alert('An Error Occurred');</script>";
        }
    }
}
elseif ($_GET['action'] === 'view') {

    $userID;

    foreach($_SESSION["cart"] as $values) {

        if ($values['item_id'] == $_GET['pro_id']) {

            $productID = $values['productID'];
            $productImg = $values['productImg'];
            $productName = $values['productName'];
            $productQuantity = $values['productQuantity'];
            $productPrice = $values['productPrice'];
            $totalPrice = number_format($values['productQuantity'] * $values['productPrice'], 2);
            $transactionID = substr($productName, 0, 3) . uniqid();

            $transactionStatus = 'pending';

            $query = mysqli_query($connect, "INSERT INTO userorders(userID,transactionID,productID,productImg,productName,productPrice,productQuantity,totalPrice,transactionStatus)
                VALUES('$userID','$transactionID','$productID','$productImg','$productName','$productPrice','$productQuantity','$totalPrice','$transactionStatus') ");

            if ($query) {

                echo "<script>window.location = 'remove.php?action=delete_single&pro_id=$productID&userID=$userID'</script>";

            } else {
                echo "<script>alert('An Error Occurred');</script>";
            }
        }
    }
}
