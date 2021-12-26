<?php
    $title = " EDIT ACCOUNT";
    include_once "../config.php";
    include_once "_header.php";

    global $connect;
    $errors = [];

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";

}
else{

    if(trim($_GET['a_id']) !== '') {


        $adminID = $_GET['a_id'];

        $query = mysqli_query($connect, "SELECT * FROM admin WHERE adminID = '$adminID' ");

        $row = mysqli_fetch_assoc($query);

    }
    if (isset($_POST['submit'])){

        function check($data){

            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            return $data;
        }

        $adminID = check($_POST['adminID']);
        $inputName = check($_POST['adminName']);
        $inputPassword = check(sha1($_POST['adminPassword']));
        $confirmPass = check(sha1($_POST['confirmPass']));

        if ($inputPassword !== $confirmPass){

            array_push($errors,"passwords do not match");
        }
        else{
                $update = mysqli_query($connect, "UPDATE admin SET  adminName = '$inputName', adminPassword = '$inputPassword' WHERE adminID = '$adminID' ");

                if($update){

                    array_push($errors, 'account info updated.');
                    echo "<script>alert('Account Info Updated');</script>";
                    echo "<script>window.location='index.php'</script>";
                }
                else{

                    array_push($errors, 'sorry account info not updated. try again!');
                }

            }
        }



?>
    <div class="dashboard-wrapper">

        <!-- side bar -->
        <?php include_once "sidebar.php"; ?>

        <!-- content -->
        <div class="content-wrapper">

            <!-- header -->
            <?php include_once "content-header.php"; ?>

            <!-- main content -->
            <div class="main-content-wrapper">
                <!-- title -->
                <h2 class="main-title">edit account</h2>

                <div class="content-box">
                    <div class="form-box">
                        <?php  foreach($errors as $error){ ?>
                            <div class="error-msg"><p><?= $error ?></p></div>
                        <?php } ?>

                        <form action="" method="post" class="admin-form w-50">
                            <div>
                                <input type="text" name="adminID" id="formInput" value="<?= $row['adminID']; ?>">
                                <input type="text" name="adminName" id="formInput" value="<?= $row['adminName']; ?>">
                            </div>
                            <div>
                                <input type="password" name="adminPassword" id="formInput" placeholder="Password" required>
                            </div>
                            <div>
                                <input type="password" name="confirmPass" id="formInput" placeholder="Confirm Password" required>
                            </div>
                            <div>
                                <input type="submit" name="submit" id="formSubmit" value="add account">
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
        <!-- overlay -->
        <div class="overlay"></div>


    </div>

<?php }

include_once "_footer.php";
?>



