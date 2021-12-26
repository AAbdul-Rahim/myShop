<?php

include_once "../config.php";

global $connect;

//accept or reject user seller request

$userID = $_GET['userID'];

$query = mysqli_query($connect, "SELECT * FROM users WHERE userID = '$userID' ");




