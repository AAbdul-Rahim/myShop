<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<style>
    *{
        padding: 0;
        margin: 0;
    }
    body{
        background-color: #eee;
    }
    ul,li{
        list-style: none;
    }
    a{
        text-decoration: none;
    }
/*=================================================
            DASHBOARD CSS STYLE BEGINS
=================================================*/
    .dashboard-wrapper{
        width: 100%;
        min-height: 150vh;
        display: flex;
    }
    .sidebar-wrapper{
        width: 60%;
        height: 100%;
        position: fixed;
        top: 0;
        left: -60%;
        background-color: #222e3c;
        padding-bottom: 2.5em;
        /*display: none;*/
        z-index: 999;
        overflow-y: scroll;
        transition: all 0.3s;
    }
    .sidebar-wrapper::-webkit-scrollbar{
        width: 5px;
    }
    .sidebar-wrapper::-webkit-scrollbar-track{
        border-radius: 10px;
        box-shadow: inset 0 0 5px #eee;
    }
    .sidebar-wrapper::-webkit-scrollbar-thumb{
        background-color: gray;
        border-radius: 10px;
    }
    .sidebar-wrapper::-webkit-scrollbar-thumb:hover{
        background: orange;
    }
    .sidebar-wrapper.active{
        left: 0;
    }
    .overlay {
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 998;
        opacity: 0;
        transition: all 0.5s ease-in-out;
    }
    .overlay.active {
        display: block;
        opacity: 1;
    }
    .sidebar-header-wrapper{
        display: flex;
        padding: 1em;
        justify-content: space-between;
        background-color: #fff;
        flex-direction: row;
    }
    .toggle-btn .fa{
        background-color: #0f0f0f;
        color: orange;
        font-size: 1.2em;
        padding: .4em .6em;
        border-radius: .2em;
        cursor: pointer;
    }
    .toggle-btn .fa:hover{
        background-color: orange;
        color: #0f0f0f;
        box-shadow: 0 .1em .3em rgba(0,0,0,.5);
        transition: all .3s ease-in;
    }
    .sidebar-menu-wrapper h5{
        color: #eee;
        text-transform: capitalize;
        text-align: center;
        margin: 1em auto;
    }
    .sidebar-menu-wrapper hr{
        border: none;
        height: .15em;
        background-color: #293946;
        padding: 0;
        margin: 0;
    }
    .sidebar-menu-wrapper ul{
        margin-top: 2em;
        padding-left: 0;
    }
    .sidebar-menu-wrapper ul li a{
        display: block;
        color: #777;
        padding: .8em 0 .8em 1.5em;
        text-transform: capitalize;
    }
    .sidebar-menu-wrapper ul li a:hover{
        color: orange;
    }
    .sidebar-menu-wrapper ul li a .fa{
        margin-right: .5em;
        font-size: 1.2em;
    }
    .logout-btn{
        text-align: center;
        margin-top: 1em;
    }
    .logout-btn a{
        color: orange;
        text-transform: capitalize;
    }
    .logout-btn a:hover{
        padding: .5em;
        background-color: #2a3645;
    }
    .content-wrapper {
        width: 100%;
        min-height: 100vh;
        transition: all 0.3s;
        position: relative;
        top: 0;
        right: 0;
    }
    .content-header-wrapper{
        width: 100%;
        background-color: #fff;
        position: fixed;
        display: flex;
        justify-content: space-between;
        /*padding: 0 5%;*/
        align-items: center;
        box-shadow: 0 .2em .5em rgba(0, 0, 0, .3);
        z-index: 3;
    }
    .header-menu-wrapper ul{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .header-menu-wrapper ul li a{
        padding: 0 1em;
        color: #1a1e21;
    }
    .header-menu-wrapper ul li a:hover{
        color: orange;
    }
    .main-content-wrapper{
        width: 95%;
        min-height: 80vh;
        background-color: #fff;
        margin: 17vh auto 1em auto;
        padding: 2em 0;
    }
    @media only screen and (min-width: 768px) {
        .toggle-btn{
            display: none;
        }
        .sidebar-wrapper{
            width: 23%;
            height: 100vh;
            left: 0;
            display: block;
        }
        .content-wrapper{
            width: 77%;
            margin-left: 23%;
        }
        .content-header-wrapper{
            width: 77%;
        }
        /*.header-menu-wrapper{*/
        /*    width: 77%;*/
        /*}*/
        .main-content-wrapper{
            width: 95%;
            min-height: 80vh;
            box-shadow: 0 0 .6em rgba(0, 0, 0, .3);
        }
        .overlay.active{
            display: none !important;
        }
    }
</style>
<body>
<div class="dashboard-wrapper">

    <!-- sidebar -->
    <nav class="sidebar-wrapper">
        <div class="sidebar-header-wrapper">
            <!-- logo -->
            <div class="sidebar-logo"><a href="">my shop</a></div>
            <!-- toggle btn -->
            <div class="toggle-close toggle-btn">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <!-- side menus -->
        <div class="sidebar-menu-wrapper">
                <ul>
                    <ul>
                        <h5>admin info</h5>
                        <hr>
                        <li>
                            <a href="">
                                <i class="fa fa-user"></i>
                                <span>account summary</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-user-plus"></i>
                                <span>add admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-user-cog"></i>
                                <span>edit account</span>
                            </a>
                        </li>
                        <hr>
                        <h5>customer info</h5>
                        <hr>
                        <li>
                            <a href="">
                                <i class="fa fa-folder-open"></i>
                                <span>user records</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-boxes"></i>
                                <span>orders</span>
                            </a>
                        </li>
                        <hr>
                        <h5>product info</h5>
                        <li>
                            <a href="../product/addProduct.php">
                                <i class="fa fa-plus-square"></i>
                                <span>add products</span>
                            </a>
                        </li>
                        <li>
                            <a href="allProducts.php">
                                <i class="fa fa-list-ul"></i>
                                <span>all products</span>
                            </a>
                        </li>
                        <hr>
                        <div class="logout-btn">
                            <a href="../admin/logout.php">
                                <i class="fa fa-power-off"></i>
                                <span>logout</span>
                            </a>
                        </div>
                    </ul>
                </ul>
            </div>
    </nav>

    <!-- content -->
    <div class="content-wrapper">
        <!-- content header -->
        <div class="content-header-wrapper">

            <!-- toggle btn -->
            <div class="toggle-open toggle-btn">
                <i class="fa fa-bars"></i>
            </div>

            <!---->
            <div class="header-menu-wrapper">
                <ul>
                        <li><a href="">home</a></li>
                        <li><a href="">cart</a></li>
                    </ul>
            </div>
            <!-- -->
            <div class="welcome-msg">
                <h6>welcome: admin</h6>
            </div>

        </div>
        <!-- main content -->
        <div class="main-content-wrapper"></div>
    </div>
    <div class="overlay"></div>
</div>
</body>
<script src="js/jquery-3.4.1.slim.min.js" charset="utf-8"></script>
<script src="js/popper.min.js" charset="utf-8"></script>
<script src="js/bootstrap.min.js" charset="utf-8"></script>
<script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        $(".toggle-close, .overlay").on('click', function (){
            $(".sidebar-wrapper").removeClass('active');
            $(".overlay").removeClass('active');
        });
        $(".toggle-open").on('click', function (){
            $(".sidebar-wrapper").addClass('active');
            $(".overlay").addClass('active');
        })
    })
</script>