<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            width: 100%;
        }
        .step-prog-bar{
            margin-top: 20%;
            counter-reset: step;
        }
        .step-prog-bar li{
            list-style: none;
            float: left;
            width: 20%;
            position: relative;
            text-align: center;
            color: #aaa;
            text-transform: uppercase;
            font-size: 12px;
        }
        .step-prog-bar li::before{
            content: counter(step);
            counter-increment: step;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border: 2px solid #ddd;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: #fff;
            color: #aaa;
        }
        .step-prog-bar li::after{
            content: '';
            position: absolute;
            top: 15px;
            left: -50%;
            border: 2px solid #ddd;
            width: 100%;
            z-index: -1;
        }
        .step-prog-bar li:first-child::after{
            content: none;
        }
        .step-prog-bar li.active{
            color: orange;
            font-weight: bold;
            font-size: 13px;
        }
        .step-prog-bar li.active::before{
            border-color: orange;
            color: #fff;
            background-color: orange;
        }
        .step-prog-bar li.active + li::after{
            border-color: orange;
        }

    </style>
</head>
<body>
<div class="container">
    <ul class="step-prog-bar">
        <li class="active">order place</li>
        <li>ready for shipping</li>
        <li>shipped</li>
        <li>ready for delivery</li>
        <li>oderer delivered</li>
    </ul>
</div>
</body>
</html>