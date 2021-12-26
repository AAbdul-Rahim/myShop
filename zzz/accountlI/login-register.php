<?php

    $title = " LOGIN / REGISTER";
    include_once "navLinks.php";

?>
<div class="main-wrapper">
    <div class="login-register-wrapper">
        <div class="container-fluid login-register-content">
            <div class="row">
                <div class="col-md-5 login-wrapper">
                    <h4>user login</h4>
                    <form action="loginConnect.php" method="post">

                        <!-- error msg -->
                        <div class="error-msg"></div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-labels">your email <span class="text-danger fw-bold">*</span></div>
                                <input type="email" name="userEmail" id="formInput" required>
                            </div>
                            <div class="col-12">
                                <div class="form-labels">password <span class="text-danger fw-bold">*</span></div>
                                <input type="password" name="userPassword" id="formInput" required>
                            </div>
                            <div class="col-md-6 forgot">
                                <a href="">forgotten password ?</a>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="submit" id="formSubmit" value="login">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 register-wrapper">
                    <h4>create account</h4>
                    <form action="signupConnect.php" method="post">
                        <!-- error msg -->
                        <div class="error-msg"></div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-labels">first name <span class="text-danger fw-bold">*</span></div>
                                <input type="text" name="firstName" id="formInput" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">last name <span class="text-danger fw-bold">*</span></div>
                                <input type="text" name="lastName" id="formInput" required>
                            </div>
                            <div class="col-12">
                                <div class="form-labels">email <span class="text-danger fw-bold">*</span></div>
                                <input type="email" name="email" id="formInput" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">gender <span class="text-danger fw-bold">*</span></div>
                                <select name="gender" id="formInput" required>
                                    <option value="">-- Your Gender --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">user type <span class="text-danger fw-bold">*</span></div>
                                <select name="userType" id="formInput" required>
                                    <option value="">-- Select User Type --</option>
                                    <option value="customer">User</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">phone number <span class="text-danger fw-bold">*</span></div>
                                <input type="text" name="phone" id="formInput" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">Country <span class="text-danger fw-bold">*</span></div>
                                <input type="text" name="country" id="formInput" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">password <span class="text-danger fw-bold">*</span></div>
                                <input type="password" name="userPassword" id="formInput" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-labels">confirm password <span class="text-danger fw-bold">*</span></div>
                                <input type="password" name="confirmPass" id="formInput" required>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="submit" id="formSubmit" value="register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once "_userFooter.php";
?>