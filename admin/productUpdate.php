
<!-- Modal -->
<div class="modal fade" id="update_product<?php echo $row['productID'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--  form  -->
            <form method="POST" action="" class="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title text-warning text-uppercase text-bold">Update Product</h5>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 mb-5">
                            <input type="hidden" name="productID" value="<?= $row['productID'] ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mb-5">
                            <label class="mb-2">Product Image</label>
                            <input type="file" name="productImg" class="form-control-file">
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <label class="mb-2">Item Name</label>
                            <input type="text" name="productName" value="<?= $row['productName'] ?>" class="form-control">
                        </div>

                        <div class="form-group col-md-6 mb-5">
                            <label class="mb-2">Product Category</label>
                            <select name="productCategory" id="" class="form-control" required>
                                <option value="">-Select Category</option>
                                <option value="cloths">Cloths</option>
                                <option value="shoes">Shoes</option>
                                <option value="bags">Bags</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-5">
                            <label class="mb-2">Product User</label>
                            <select name="productUser" id="" class="form-control" required>
                                <option value="">-Select Product User</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-5">
                            <label class="mb-2">Product Price</label>
                            <input type="number" name="productPrice" value="<?= $row['productPrice'] ?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-5">
                            <label class="mb-2">Product Quantity</label>
                            <input type="number" name="productQuantity" value="<?= $row['productQuantity'] ?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-5 mt-5">
                            <input type="radio" name="new">
                            <span>New Product</span>
                        </div>



                        <div class="col-md-7 mb-5">
                            <label class="mb-2">Product Description</label>
                            <textarea name="productDesc" cols="60" rows="5" class="form-text pl-0">
                                <?php echo $row['productDesc'] ?>
                            </textarea>
                      
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" name="add" value="Update Product" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

include_once '../config.php';

global $connect;

if (isset($_POST['add'])){

    function check($data){

        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }



    $productID = check($_POST['productID']);
    $inputName = check($_POST['productName']);
    $inputCategory = check($_POST['productCategory']);
    $inputUser = check($_POST['productUser']);
    $inputPrice = check($_POST['productPrice']);
    $inputQuantity = check($_POST['productQuantity']);
    $inputDesc = check($_POST['productDesc']);
    $new = check(isset($_POST['new'])) ? "yes ": "no" ;


    // file upload
    $fileName = $_FILES['productImg']['name'];
    $fileSize = $_FILES['productImg']['size'];
    $error = $_FILES['productImg']['error'];
    $tmpName = $_FILES['productImg']['tmp_name'];

    $fileSplit = explode('.',$fileName);
    $fileExt = end($fileSplit);

    $allowedExt = ['jpg', 'png', 'jpeg'];

    // checking file size
    if($fileSize < 5000000) {

        // checking whether file format is supported
        if (in_array($fileExt, $allowedExt)) {

            // moving file to folder
            if (move_uploaded_file($tmpName, '../uploads/' . $fileName)) {

                $update = mysqli_query($connect, "UPDATE products SET productID = '$productID', 
                            productImg = '$fileName', productName = '$inputName', productCategory = '$inputCategory', 
                            productUser = '$inputUser', productPrice = '$inputPrice', productQuantity = '$inputQuantity', 
                            new = '$new',productDesc = '$inputDesc' WHERE productID = '$productID' ");

                echo "<script>alert('Product Updated Successfully.');</script>";
                echo "<script>window.location='allProducts.php'</script>";
            }
            else {
                array_push($errors, 'product not updated');
            }
        }
        else{
            array_push($errors, 'file type not supported');
        }
    }
    else{
        array_push($errors, 'File size too big');
    }

}
