<?php

$title = " LOGIN/REGISTER";
include_once "_header.php"

?>
<link rel="stylesheet" href="css/main1.css">

<div class="index-container">
    <div class="login-container">

        <div class="login-container-head">
            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">login</button>
            <hr>
            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">register</button>
        </div>

        <div class="login-container-body">

                <!-- login container -->
            <div class="login mySlides">

                <h5>user login</h5>


                <form action="accountlI/loginConnect.php" method="POST" class="form1">
                    <div>
                        <div class="labels">Email<span class="text-danger font-weight-bold">*</span></div>
                        <input type="email" name="userEmail" id="" required>
                    </div>
                    <div>
                        <div class="labels">password<span class="text-danger font-weight-bold">*</span></div>
                        <input type="password" name="userPassword" id="" required>
                    </div>
                    <input type="submit" name="submit" id="" value="login">
                </form>
            </div>
            <!-- login ends -->

                <!-- register -->
            <div class="signup mySlides">

                <h5>create account</h5>


                    <form action="accountlI/signupConnect.php" method="POST" class="form1">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-6">
                                    <input type="text" name="firstName" id="" placeholder="First Name" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="lastName" id="" placeholder="Last Name" required>
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" id="" placeholder="Email" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="gender" id="">
                                        <option value="">- Your Gender -</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" id="" placeholder="Phone Number" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="userPassword" id="" placeholder="Password" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="confirmPass" id="" placeholder="Confirm Password" required>
                                </div>
                                <div class="col-12">
                                    <input type="submit" name="submit" id="" value="register" required>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            <!-- register ends -->
        </div>


    </div>



</div>
    <div class="index-footer"></div>
<?php

include_once "_footer.php";

?>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-red", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-red";
    }
</script>

