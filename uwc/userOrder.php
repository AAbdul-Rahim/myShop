<?php

include_once '../config.php';

global $connect;

$userID = $_GET['benim'];

if (isset($_POST['submit'])) {

    $userID;



    foreach($_SESSION["userCart"] as $values) {

        $productID = $values['productID'];
        $productImg = $values['productImg'];
        $productName = $values['productName'];
        $productQuantity = $values['productQuantity'];
        $productPrice = $values['productPrice'];
        $totalPrice = $values['productQuantity'] * $values['productPrice'];
        //$transactionID = substr($productName, 0, 3) . uniqid();

//        $transactionStatus = 'pending';



        $query = mysqli_query($connect, "INSERT INTO userorders(userID,productID,productImg,productName,
                       productPrice,productQuantity,totalPrice) VALUES('$userID','$productID','$productImg',
                        '$productName','$productPrice','$productQuantity','$totalPrice') ");

        if ($query) {

           echo "<script>window.location = 'functions.php?action=remove_all&benim=$userID'</script>";

        }
        else {
            echo "<script>alert('An Error Occurred');</script>";
        }
    }
}
elseif ($_GET['action'] === 'single') {

    $userID;

    foreach($_SESSION["userCart"] as $values) {

        if ($values['item_id'] === trim($_GET['pro_id'])) {

            $productID = $values['productID'];
            $productImg = $values['productImg'];
            $productName = $values['productName'];
            $productQuantity = $values['productQuantity'];
            $productPrice = $values['productPrice'];
            $totalPrice = $values['productQuantity'] * $values['productPrice'];
           // $transactionID = substr($productName, 0, 3) . uniqid();

           // $transactionStatus = 'pending';

            $query = mysqli_query($connect, "INSERT INTO userorders(userID,productID,productImg,productName,productPrice,productQuantity,totalPrice)
                VALUES('$userID','$productID','$productImg','$productName','$productPrice','$productQuantity','$totalPrice') ");

            if ($query) {

                echo "<script>window.location = 'functions.php?action=remove_single&pro_id=$productID&benim=$userID'</script>";

            } else {
                echo "<script>alert('An Error Occurred');</script>";
            }
        }
    }
}
