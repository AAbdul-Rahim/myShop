<?php

include_once '../config.php';
global $connect;

if (isset($_POST['insert'])) {

    $fileCount = count($_FILES['productImg']['name']);

    if ($fileCount > 5) {

        echo "<script>alert('You Can Only Upload 5 pictures')</script>";
        echo "<script>window.location ='addProduct.php';</script>";

    } else {

        $userID = $_GET['benim'];

        $user = mysqli_query($connect,"SELECT * FROM users WHERE userID = '$userID' ");

        $row = mysqli_fetch_assoc($user);

        $sellerID = $row['sellerID'];


        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQty = $_POST['productQty'];
        $productCat = $_POST['productCat'];
        $firstColor = $_POST['firstColor'];
        $secondColor = $_POST['secondColor'];
        $thirdColor = $_POST['thirdColor'];
        $forthColor = $_POST['forthColor'];
        $new = isset($_POST['new']) ? 'new' : 'no';
        $feature = isset($_POST['featured']) ? 'featured' : 'no';
        $productDesc = $_POST['productDesc'];

        //product id generation
        $rand = uniqid();
        $month = date('m');
        $year = substr(date('Y'), 2);
        $productID = substr($productName, 0, 3) . $rand;
        $productID = strtolower($productID);

        //image upload
        foreach ($_FILES['productImg']['tmp_name'] as $key => $value) {


            $fileName = $_FILES['productImg']['name'][$key];
            $tmpName = $_FILES['productImg']['tmp_name'][$key];
            $fileSize = $_FILES['productImg']['size'][$key];
            $error = $_FILES['productImg']['error'][$key];

            $fileSplit = explode('.', $fileName);
            $fileExt = end($fileSplit);

            $allowedExt = ['jpg', 'png', 'jpeg'];

            // checking file size

            if ($fileSize < 5000000) {

                // checking whether file format is supported
                if (in_array($fileExt, $allowedExt)) {

                    // moving file to folder
                    if (move_uploaded_file($tmpName, '../uploads/' . $fileName)) {

                        $insert = mysqli_query($connect, "INSERT INTO images(productID,productImg) VALUES('$productID','$fileName') ");
                    }
                } else {

                    echo "<script>alert('File Type Not Supported')</script>";
                    echo "<script>window.location ='addProduct.php?benim=$userID';</script>";

                }
            } else {
                array_push($errors, 'File size too big');

                echo "<script>alert('File Size Too Big')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }


        if ($productCat === 'cloths') {

            $productUser = $_POST['productUser1'];
            $productType = $_POST['productType1'];
            $productBrand = $_POST['productBrand1'];
            $pant1 = $_POST['pant1'];
            $pant2 = $_POST['pant2'];
            $pant3 = $_POST['pant3'];
            $pant4 = $_POST['pant4'];
            $shirt1 = $_POST['shirt1'];
            $shirt2 = $_POST['shirt2'];
            $shirt3 = $_POST['shirt3'];
            $shirt4 = $_POST['shirt4'];


            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                     productUser,productCat,productType,productBrand,new,feature,productDesc)
                                     VALUES('$sellerID','$productID','$productName','$productPrice','$productQty',
                                     '$productUser','$productCat','$productType','$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,pant1,pant2,pant3,pant4,shirt1,
                                              shirt2,shirt3,shirt4,color1,color2,color3,color4) VALUES('$productID','$pant1','$pant2','$pant3','$pant4','$shirt1',
                                              '$shirt2','$shirt3','$shirt4','$firstColor','$secondColor','$thirdColor','$forthColor') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'shoes') {
            $productUser = $_POST['productUser2'];
            $productType = $_POST['productType2'];
            $productBrand = $_POST['productBrand2'];
            $shoe1 = $_POST['shoe1'];
            $shoe2 = $_POST['shoe2'];
            $shoe3 = $_POST['shoe3'];
            $shoe4 = $_POST['shoe4'];


            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                     productUser,productCat,productType,productBrand,new,feature,productDesc)
                                     VALUES('$sellerID','$productID','$productName','$productPrice','$productQty',
                                     '$productUser','$productCat','$productType','$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,shoe1,shoe2,shoe3,shoe4,
                                    color1,color2,color3,color4) VALUES('$productID','$shoe1','$shoe2','$shoe3','$shoe4',
                                    '$firstColor','$secondColor','$thirdColor','$forthColor') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'bags') {
            $productUser = $_POST['productUser3'];
            $productType = $_POST['productType3'];
            $productBrand = $_POST['productBrand3'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                     productUser,productCat,productType,productBrand,new,feature,productDesc)
                                     VALUES('$sellerID','$productID','$productName','$productPrice','$productQty',
                                     '$productUser','$productCat','$productType','$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,color1,color2,color3,color4)
                                     VALUES('$productID','$firstColor','$secondColor','$thirdColor','$forthColor') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'fashion-access') {
            $productUser = $_POST['productUser4'];
            $productType = $_POST['productType4'];
            $productBrand = $_POST['productBrand4'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                     productUser,productCat,productType,productBrand,new,feature,productDesc)
                                     VALUES('$sellerID','$productID','$productName','$productPrice','$productQty',
                                     '$productUser','$productCat','$productType','$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,color1,color2,color3,color4)
                                     VALUES('$productID','$firstColor','$secondColor','$thirdColor','$forthColor') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'phone-tablet') {

            $productType = $_POST['productType5'];
            $productBrand = $_POST['productBrand5'];
            $storage1 = $_POST['storage1'];
            $storage2 = $_POST['storage2'];
            $storage3 = $_POST['storage3'];
            $storage4 = $_POST['storage4'];
            $ram1 = $_POST['ram1'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                     productCat,productType,productBrand,new,feature,productDesc)
                                     VALUES('$sellerID','$productID','$productName','$productPrice','$productQty','$productCat','$productType',
                                            '$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,storage1,storage2,
                                              storage3,storage4,color1,color2,color3,color4,RAM) VALUES('$productID','$storage1','$storage2',
                                            '$storage3','$storage4','$firstColor','$secondColor','$thirdColor','$forthColor','$ram1') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'phone-tablet-access') {

            $productType = $_POST['productType6'];
            $productBrand = $_POST['productBrand6'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                     productCat,productType,productBrand,new,feature,productDesc)
                                     VALUES('$sellerID','$productID','$productName','$productPrice','$productQty','$productCat','$productType',
                                            '$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,color1,color2,color3,color4)
                                     VALUES('$productID','$firstColor','$secondColor','$thirdColor','$forthColor') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'computer') {

            $productType = $_POST['productType7'];
            $productBrand = $_POST['productBrand7'];
            $storage1 = $_POST['storage21'];
            $storage2 = $_POST['storage22'];
            $storage3 = $_POST['storage23'];
            $storage4 = $_POST['storage24'];
            $ram1 = $_POST['ram2'];
            $screen = $_POST['screen1'];
            $processorType = $_POST['processorType'];
            $storageType = $_POST['storageType'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                         productCat,productType,productBrand,new,feature,productDesc)
                                         VALUES('$sellerID','$productID','$productName','$productPrice','$productQty','$productCat','$productType',
                                                '$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,storage1,storage2,
                                        storage3,storage4,color1,color2,color3,color4,RAM,screen,processorType,storageType)
                                        VALUES('$productID','$storage1','$storage2','$storage3','$storage4','$firstColor','$secondColor',
                                               '$thirdColor','$forthColor','$ram1','$screen','$processorType','$storageType') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'computer-access') {

            $productType = $_POST['productType8'];
            $productBrand = $_POST['productBrand8'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                         productCat,productType,productBrand,new,feature,productDesc)
                                         VALUES('$sellerID','$productID','$productName','$productPrice','$productQty','$productCat','$productType',
                                                '$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,color1,color2,color3,color4)
                                         VALUES('$productID','$firstColor','$secondColor','$thirdColor','$forthColor') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }
        elseif ($productCat === 'electronics') {

            $productType = $_POST['productType9'];
            $productBrand = $_POST['productBrand9'];
            $screen = $_POST['screen2'];

            $productInsert = mysqli_query($connect, "INSERT INTO products(sellerID,productID,productName,productPrice,productQty,
                                         productCat,productType,productBrand,new,feature,productDesc)
                                         VALUES('$sellerID','$productID','$productName','$productPrice','$productQty','$productCat','$productType',
                                                '$productBrand','$new','$feature','$productDesc') ");

            $propertyInsert = mysqli_query($connect, "INSERT INTO productProperties(productID,color1,color2,color3,color4,screen)
                                         VALUES('$productID','$firstColor','$secondColor','$thirdColor','$forthColor','$screen') ");

            if ($productInsert && $propertyInsert) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
            else{
                echo "<script>alert('An Error Occurred')</script>";
                echo "<script>window.location ='addProduct.php?benim=$userID';</script>";
            }
        }

        //    elseif ($productCat === 'others') {
        //        echo "others";
        //        echo $productType = $_POST['productType10'];
        //        echo "<br>";
        //        echo $productBrand = $_POST['productBrand10'];
        //    }
    }

}



