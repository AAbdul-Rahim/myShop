<?php

include_once '../config.php';
global $connect;


$query = mysqli_query($connect, "SELECT * FROM users WHERE lastName = '$_SESSION[userName]' AND userID = '$userID' ");

$row = mysqli_fetch_assoc($query);

extract($row);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <!-- css files  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- site title -->
    <title><?= 'SHOP |' . $title ?></title>
<div class="dashboard-header">

    <!--  toggle button  -->
    <div class="toggle open-toggle-btn">
        <i class="fa fa-bars"></i>
    </div>
    <div class="toggle close-toggle-btn">
        <i class="fa fa-times"></i>
    </div>


    <li class="nav-item all-nav-li">
        <a class="nav-link text-capitalize" href="index.php?userID=<?= $userID ?>">
            <i class="fa fa-store"></i>
            store
        </a>
    </li>



    <!-- welcome message-->
    <h6>Hi, <?= $_SESSION['userName'] ?></h6>
</div>