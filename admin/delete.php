<?php

include_once "../config.php";
global $connect;


$itemID = $_GET['itemID'];

echo $itemID;

$delete = mysqli_query($connect, "DELETE FROM products WHERE productID = '$itemID' ");

if ($delete){
    echo "<script>window.location='allProducts.php'</script>";
}
