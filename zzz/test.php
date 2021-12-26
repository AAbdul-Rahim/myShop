<?php
$name = substr('admin', 0, 3);
echo $name.uniqid();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Target Example</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            function compute() {
                var a = $('#a').val();
                var b = $('#b').val();
                var total = a * b;
                $('#total').val(total);
            }

            $('#a, #b').change(compute);

        });
    </script>
</head>
<body>
<div data-role="page" id="irr">
    <div data-role="header">
        <h1>Calculation</h1>
    </div>
    <div data-role="content">
        <div data-role="fieldcontain">
            <label for="a">Diameter:</label>
            <input type="number" name="a" id="a" value=""  />
            <label for="b">Diver:</label>
            <input type="number" name="b" id="b" value="<?php echo 4 ?>"  />
            <label for="total">Result:</label>
            <input type="text" name="total" id="total" value=""  />
        </div>
        What did we do here?
    </div>
</div>
</body>
</html>

<!--<div class="main-banner">-->
    <!--        <hr class="one">-->
    <!--        <hr class="two">-->
    <!--        <div class="main-banner-info">-->
    <!--            <h6>our shop</h6>-->
    <!--            <p>get all that you need</p>-->
    <!--        </div>-->
    <!--    </div>

