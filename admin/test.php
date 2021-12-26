<?php
    include_once "../config.php";
    global $connect;
?>
<link rel="stylesheet" href="js/datatables.css">


<table id="products_table" class="">
    <thead>
        <tr>
        <th>id</th>
        <th>image</th>
        <th>name</th>
        <th>price</th>
        <th>quantity</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $name = substr('admin', 0, 2);
    echo $adminID = $name.uniqid();

        $product = mysqli_query($connect, "SELECT * FROM products");

        while ($row = mysqli_fetch_array($product)){

            extract($row);

                $images = mysqli_query($connect, "SELECT * FROM images WHERE productID = '$productID' LIMIT 1");

                $data = mysqli_fetch_assoc($images);

                extract($data);

    ?>
        <tr>
            <td><?= $id ?></td>
            <td><img src="../uploads/<?= $productImg ?>" alt="" style="width: 2em"></td>
            <td><?= $productName ?></td>
            <td><?= $productPrice ?></td>
            <td><?= $productQty ?></td>
        </tr>
    <?php }?>

    </tbody>


</table>








<script src="../js/jquery-3.4.1.min.js"></script>
<script src="js/datatables.js"></script>
<script>
    $(document).ready(function(){
        $("#products_table").DataTable();
    });
</script>













<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <style>-->
<!--        body {font-family: Arial;}-->
<!---->
<!--        /* Style the tab */-->
<!--        .tab {-->
<!--            overflow: hidden;-->
<!--            border: 1px solid #ccc;-->
<!--            background-color: #f1f1f1;-->
<!--        }-->
<!---->
<!--        /* Style the buttons inside the tab */-->
<!--        .tab button {-->
<!--            background-color: inherit;-->
<!--            float: left;-->
<!--            border: none;-->
<!--            outline: none;-->
<!--            cursor: pointer;-->
<!--            padding: 14px 16px;-->
<!--            transition: 0.3s;-->
<!--            font-size: 17px;-->
<!--        }-->
<!---->
<!--        /* Change background color of buttons on hover */-->
<!--        .tab button:hover {-->
<!--            background-color: #ddd;-->
<!--        }-->
<!---->
<!--        /* Create an active/current tablink class */-->
<!--        .tab button.active {-->
<!--            background-color: #ccc;-->
<!--        }-->

<!--        /* Style the tab content */-->
<!--        .tabcontent {-->
<!--            display: none;-->
<!--            padding: 6px 12px;-->
<!--            border: 1px solid #ccc;-->
<!--            border-top: none;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<p>In this example, we use JavaScript to "click" on the London button, to open the tab on page load.</p>-->
<!---->
<!--<div class="tab">-->
<!--    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>-->
<!--    <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>-->
<!--    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>-->
<!--</div>-->
<!---->
<!--<div id="London" class="tabcontent">-->
<!--    <h3>London</h3>-->
<!--    <p>London is the capital city of England.</p>-->
<!--</div>-->
<!---->
<!--<div id="Paris" class="tabcontent">-->
<!--    <h3>Paris</h3>-->
<!--    <p>Paris is the capital of France.</p>-->
<!--</div>-->
<!---->
<!--<div id="Tokyo" class="tabcontent">-->
<!--    <h3>Tokyo</h3>-->
<!--    <p>Tokyo is the capital of Japan.</p>-->
<!--</div>-->

<!--<script>-->
<!--    function openCity(evt, cityName) {-->
<!--        var i, tabcontent, tablinks;-->
<!--        tabcontent = document.getElementsByClassName("tabcontent");-->
<!--        for (i = 0; i < tabcontent.length; i++) {-->
<!--            tabcontent[i].style.display = "none";-->
<!--        }-->
<!--        tablinks = document.getElementsByClassName("tablinks");-->
<!--        for (i = 0; i < tablinks.length; i++) {-->
<!--            tablinks[i].className = tablinks[i].className.replace(" active", "");-->
<!--        }-->
<!--        document.getElementById(cityName).style.display = "block";-->
<!--        evt.currentTarget.className += " active";-->
<!--    }-->
<!---->
<!--    // Get the element with id="defaultOpen" and click on it-->
<!--    document.getElementById("defaultOpen").click();-->
<!--</script>-->
<!---->
<!--</body>-->
<!--</html>-->














































<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <style>-->
<!--        body {-->
<!--            margin: 0;-->
<!--            background-color: #f1f1f1;-->
<!--            font-family: Arial, Helvetica, sans-serif;-->
<!--        }-->
<!---->
<!--        #navbar {-->
<!--            background-color: #333;-->
<!--            position: fixed;-->
<!--            top: -50px;-->
<!--            width: 100%;-->
<!--            display: block;-->
<!--            transition: top 0.3s;-->
<!--        }-->
<!---->
<!--        #navbar a {-->
<!--            float: left;-->
<!--            display: block;-->
<!--            color: #f2f2f2;-->
<!--            text-align: center;-->
<!--            padding: 15px;-->
<!--            text-decoration: none;-->
<!--            font-size: 17px;-->
<!--        }-->
<!---->
<!--        #navbar a:hover {-->
<!--            background-color: #ddd;-->
<!--            color: black;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<div id="navbar">-->
<!--    <a href="#home">Home</a>-->
<!--    <a href="#news">News</a>-->
<!--    <a href="#contact">Contact</a>-->
<!--</div>-->
<!---->
<!--<div style="padding:15px 15px 2500px;font-size:30px">-->
<!--    <p><b>This example demonstrates how to slide down a navbar when the user starts to scroll the page.</b></p>-->
<!--    <p>Scroll down this frame to see the effect!</p>-->
<!--    <p>Scroll to the top to hide the navbar.</p>-->
<!--    <p>Lorem ipsum dolor dummy text sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->
<!--</div>-->
<!---->
<!--<script>-->
<!--    // When the user scrolls down 20px from the top of the document, slide down the navbar-->
<!--    window.onscroll = function() {scrollFunction()};-->
<!---->
<!--    function scrollFunction() {-->
<!--        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {-->
<!--            document.getElementById("navbar").style.top = "0";-->
<!--        } else {-->
<!--            document.getElementById("navbar").style.top = "-50px";-->
<!--        }-->
<!--    }-->
<!--</script>-->
<!---->
<!--</body>-->
<!--<script>-->
<!---->
<!--    // $( "#sideBar" ).scroll();-->
<!--    $( window ).scroll(function() {-->
<!--        $( "sideBar" ).css( "overflow", "auto" ).fadeOut( "slow" );-->
<!--        $( "#target" ).scroll(function() {-->
<!--            $( "#log" ).append( "<div>Handler for .scroll() called.</div>" );-->
<!--        });-->
<!--    });-->
<!--</script>-->
</html>