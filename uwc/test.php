<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <style>
        h1{
            width: 3%;
            position: relative;
            top: 20%;
            left: 90%;
            cursor: pointer;
        }
        h1:before{
            content: attr(data-count);
            position: absolute;
            color: #fff;
            right: 16px;
            font-size: 15px;
            text-align: center;
            top: -12px;
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            opacity: 0;
        }
        h1.zero:before{
            opacity: 1;
        }
    </style>
</head>
<body>

<h1><i class="fa fa-shopping-cart"></i></h1>
<section>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam aspernatur
        dignissimos ea eaque explicabo harum iste nisi non nostrum placeat quaerat,
        quas, quo recusandae rerum sapiente sequi temporibus vero?
    </p>
    <h6>$64645.47</h6>
    <span></span>
    <button>add-to-cart</button>
</section>
</body>
<script>
    var noti = document.querySelector('h1');
    var select = document.querySelector('.select');
    var button = document.getElementsByTagName('button');

    for(but of button){
        but.addEventListener('click',(e)=>{
            var add = Number(noti.getAttribute('data-count') || 0);
            noti.setAttribute('data-count', add + 1);
            noti.classList.add('zero');
        })
    }
</script>
</html>
