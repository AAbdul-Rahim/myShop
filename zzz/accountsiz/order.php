<?php

include_once 'config.php';
global $connect;


if (isset($_POST['submit'])) {


    foreach($_SESSION["cart"] as $values) {

        $productID = $values['productID'];
        $productImg = $values['productImg'];
        $productName = $values['productName'];
        $productQuantity = $values['productQuantity'];
        $productPrice = $values['productPrice'];
        $totalPrice = number_format($values['productQuantity'] * $values['productPrice'], 2);
        $transactionID = substr($productName, 0, 3) . uniqid();

        $transactionStatus = 'pending';

        $query = mysqli_query($connect, "INSERT INTO userorders(transactionID,productID,productImg,productName,productPrice,productQuantity,totalPrice,transactionStatus)
                VALUES('$transactionID','$productID','$productImg','$productName','$productPrice','$productQuantity','$totalPrice','$transactionStatus') ");

        if ($query) {

            echo "<script>window.location = 'removeProduct.php?action=delete_all'</script>";

        }
        else {
            echo "<script>alert('An Error Occurred');</script>";
                }
            }
}
elseif ($_GET['action'] === 'view'){


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

            $query = mysqli_query($connect, "INSERT INTO userorders(transactionID,productID,productImg,productName,productPrice,productQuantity,totalPrice,transactionStatus)
                    VALUES('$transactionID','$productID','$productImg','$productName','$productPrice','$productQuantity','$totalPrice','$transactionStatus') ");

            if ($query) {

                echo "<script>window.location = 'removeProduct.php?action=delete_single&pro_id=$productID'</script>";

            } else {
                echo "<script>alert('An Error Occurred');</script>";
            }
        }
    }
}
