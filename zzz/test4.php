<style>
    *{
        padding: 0;
        margin: 0;
    }
    body{
        background-color: #eee;
    }
    .dashboard-wrapper{
        width: 100%;
        min-height: 100vh;
        display: flex;
    }
    .sidebar-wrapper{
        display: none;
        min-height: 100vh;
        background-color: #6f42c1;
        position: fixed;
    }
    .content-wrapper{
        width: 100%;
        min-height: 100vh;
        background-color: #6a1a21;
    }
    .content-header-wrapper{
        width: 80%;
        height: 12vh;
        background-color: #fff;
        position: fixed;
        display: flex;
        justify-content: flex-end;
    }
    @media only screen and (min-width: 768px) {
        .sidebar-wrapper{
            /*display: block;*/
            width: 23%;
            height: 100vh;
            background-color: #6f42c1;

        }
        .content-wrapper{
            width: 77%;
            margin-left: 23%;
            background-color: #0dcaf0;
            position: absolute;
        }

    }
</style>
<div class="dashboard-wrapper">
    <div class="sidebar-wrapper"></div>
    <div class="content-wrapper">
        <div class="content-header-wrapper">
            hello
        </div>
        <div class="main-content-wrapper"></div>
    </div>
</div>
