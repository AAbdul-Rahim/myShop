<?php

    session_start();
//
    $userID = trim($_GET['benim']);

//session_unset($stop);




if(isset($userID)){
    session_destroy();
    //session_unset();
    echo "<script>window.location='login-register.php'</script>";
}