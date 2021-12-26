<?php

    $query = mysqli_query($connect, "SELECT * FROM users WHERE lastName = '$_SESSION[userName]' AND userID = '$userID' ");

    $row = mysqli_fetch_assoc($query);

    extract($row);

?>
<div class="content-header-wrapper">

    <!-- toggle btn -->
    <div class="toggle-open toggle-btn">
        <i class="fa fa-bars"></i>
    </div>

    <!---->
    <div class="header-menu-wrapper">
        <ul>
            <li><a href="index.php?benim=<?= $userID ?>"><i class="fa fa-home"></i>home</a></li>
            <li><a href="userCart.php?benim=<?= $userID ?>"><i class="fa fa-shopping-bag"></i>cart</a></li>
        </ul>
    </div>
    <!-- -->
    <div class="welcome-msg">
        <h6>welcome: <?= $_SESSION['userName'] ?></h6>
    </div>

</div>