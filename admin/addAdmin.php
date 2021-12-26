<?php

$title = " ADD ADMIN";
include_once "_header.php";
include_once "../config.php";

global $connect;
$errors = [];

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";

}
else{

    if (isset($_POST['submit'])){

        function check($data){

            $data = htmlentities($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);

            return $data;
        }

        $inputName = check($_POST['adminName']);
        $userType = check($_POST['userType']);
        $accountType = check($_POST['accountType']);
        $inputPassword = check(sha1($_POST['adminPassword']));
        $confirmPass = check(sha1($_POST['confirmPass']));

        // use to generate user id
//        $rand = rand(10,99);
//        $month = date('m');
//        $year = substr(date('Y') , 2);
        $name = substr($_POST['adminName'], 0, 2);

        $adminID = $name.uniqid();

        if ($inputPassword !== $confirmPass){

            array_push($errors,"passwords do not match");
        }
        else{

            $query = mysqli_query($connect,"SELECT * FROM admin WHERE adminName = '$inputName' ");
            $num = mysqli_num_rows($query);

            if ($num === 1){

                array_push($errors,"account already exist");
            }
            else{

                $insert = mysqli_query($connect, "INSERT INTO admin(adminID,adminName,userType,accountType,adminPassword) VALUES('$adminID','$inputName','$userType','$accountType','$inputPassword')");
                if($insert){

                    array_push($errors, 'account created successfully.');
                }
                else{

                    array_push($errors, 'sorry account not created. try again!');
                }
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
                <h2 class="main-title">add an account</h2>

                <div class="content-box">
                    <div class="form-box">
                        <?php  foreach($errors as $error){ ?>
                            <div class="error-msg"><p><?= $error ?></p></div>
                        <?php } ?>

                        <form action="" method="post" class="admin-form w-50">
                            <div>
                                <input type="text" name="adminName" id="formInput" placeholder="Admin Name" required>
                            </div>
                            <div>
                                <select name="userType" id="formInput" required>
                                    <option value="">-- Select User Type --</option>
                                    <option value="normal">Normal</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                            <div>
                                <select name="accountType" id="formInput" required>
                                    <option value="">-- Select Account Type --</option>
                                    <option value="admin">Admin</option>
                                    <option value="delivery">Delivery Man</option>
                                </select>
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

<?php
    }

    include_once "_footer.php";
?>

