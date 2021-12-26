<?php

include_once "../config.php";
global $connect;


$productID = $_GET['pro_id'];

$userID = $_GET['userID'];

$delete = mysqli_query($connect, "DELETE FROM userorders WHERE productID = '$productID' ");

if ($delete){

    echo "<script>alert('Product Removed From Checkout')</script>";
    echo "<script>window.location='userCheckout.php?userID=$userID'</script>";
}
