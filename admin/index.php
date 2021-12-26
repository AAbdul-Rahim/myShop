
<?php

$title = " ADMIN LOGIN";

include_once "_header.php";

include_once '../config.php';

global $connect;

$errors  = [];

    if (isset($_POST['submit'])){

        function check($data){

                $data = htmlentities($data);
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                return $data;
            }

        $inputName = check($_POST['adminName']);
        $inputPassword = check(sha1($_POST['adminPassword']));

        $query = mysqli_query($connect,"SELECT * FROM admin WHERE adminName ='$inputName' AND adminPassword = '$inputPassword'  ");
        $num = mysqli_num_rows($query);

      if ($num === 1){

           $_SESSION['adminName'] = $inputName;
            header("location: dashboard.php");
        }
        else{
            array_push($errors, "wrong user name or password");
       }

      $_SESSION['submit'] = true;

}

?>
<div class="admin-login-wrapper">
    <div class="admin-content-wrapper">
        <h4>admin login</h4>

        <!-- error msg display -->
        <?php
            foreach($errors as $error){
        ?>
            <div class="error-msg"><p><?= $error ?></p></div>
        <?php } ?>
        <form action="" method="post" class="admin-form">
            <div>
                <div class="form-labels">admin name <span class="text-danger fw-bold">*</span></div>
                <input type="text" name="adminName" id="formInput" placeholder="Admin Name" required>
                <i class="fa fa-user"></i>
            </div>
            <div>
                <div class="form-labels">password <span class="text-danger fw-bold">*</span></div>
                <input type="text" name="adminPassword" id="formInput" placeholder="Password" required>
                <i class="fa fa-lock"></i>
            </div>
            <div>
                <input type="submit" name="submit" id="formSubmit" value="login">
            </div>
        </form>
    </div>
</div>
<?php   include_once "_footer.php";
