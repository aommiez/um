<?php
use Main\Helper;
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            <?php
            echo \Main\AppConfig::get("application.title");
            ?>
        </title>

        <!-- Bootstrap -->
        <link href="<?php echo Helper\URL::absolute("/public/css/bootstrap.min.css")?>" rel="stylesheet">
        <!-- Material Css -->
        <link href="<?php echo Helper\URL::absolute("/public/css/roboto.min.css")?>" rel="stylesheet">
        <link href="<?php echo Helper\URL::absolute("/public/css/material.min.css")?>" rel="stylesheet">
        <link href="<?php echo Helper\URL::absolute("/public/css/ripples.min.css")?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo \Main\Helper\URL::absolute("/public/js/jquery.min.js")?>"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo \Main\Helper\URL::absolute("/public/js/bootstrap.min.js")?>"></script>
        <!-- Sweet Alert -->
        <script src="<?php echo Helper\URL::absolute("/public/js/sweet-alert.min.js")?>"></script>
        <link href="<?php echo Helper\URL::absolute("/public/css/sweet-alert.css")?>" rel="stylesheet">
        <link href="<?php echo Helper\URL::absolute("/public/css/ie9.css")?>" rel="stylesheet">
        <!-- font awesome -->
        <link href="<?php echo Helper\URL::absolute("/public/css/font-awesome.min.css")?>" rel="stylesheet">
        <!-- Material jQuery -->
        <script src="<?php echo Helper\URL::absolute("/public/js/ripples.min.js")?>"></script>
        <script src="<?php echo Helper\URL::absolute("/public/js/material.min.js")?>"></script>
    </head>
<body>
<style>
    body {
        background: url(<?php echo \Main\Helper\URL::absolute("/public/images/bg_login.jpg")?>);
    }

    .jumbotron {
        text-align: center;
        width: 30rem;
        border-radius: 0.5rem;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        margin: 4rem auto;
        background-color: #fff;
        padding: 2rem;
        height: 430px;
    }

    .container .glyphicon-list-alt {
        font-size: 10rem;
        margin-top: 3rem;
        color: #f96145;
    }

    input {
        width: 100%;
        margin-bottom: 1.4rem;
        padding: 1rem;
        background-color: #ecf2f4;
        border-radius: 0.2rem;
        border: none;
    }

    h2 {
        margin-bottom: 3rem;
        font-weight: bold;
        color: #ababab;
    }

    .btn {
        border-radius: 0.2rem;
    }

    .btn .glyphicon {
        font-size: 3rem;
        color: #fff;
    }

    .full-width {
        background-color: #8eb5e2;
        width: 100%;
        -webkit-border-top-right-radius: 0;
        -webkit-border-bottom-right-radius: 0;
        -moz-border-radius-topright: 0;
        -moz-border-radius-bottomright: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .box {
        position: absolute;
        bottom: 0;
        left: 0;
        margin-bottom: 3rem;
        margin-left: 3rem;
        margin-right: 3rem;
    }
</style>
<div class="jumbotron">
    <div class="container">
        <span class="glyphicon glyphicon-list-alt"></span>

        <h2>Login</h2>

        <div class="box">
            <form data-toggle="validator" role="form" name="loginForm" id="loginForm">
                <input type="username" placeholder="username" required name="username">
                <input type="password" placeholder="password" required name="password">
                <button class="btn btn-primary full-width"><span class="glyphicon glyphicon-ok"></span></button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#loginForm").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: '<?php echo \Main\Helper\URL::absolute('/login/auth'); ?>',
                type: "POST",
                crossDomain: true,
                dataType: 'json',
                data: $("#loginForm").serialize(),
                success: function (result) {
                    if (result['status'] == 'success') {
                        $(location).attr('href', '<?php echo \Main\Helper\URL::absolute("/")?>');
                    } else {
                        swal({title: "Something went wrong!", text:result['status'], timer: 2000, type: "error"});
                    }
                },
                error: function (result) {
                    console.log(result);
                    swal({title: "Something went wrong!", text: "Server Error !", timer: 2000, type: "error"});
                }
            });
        });
    });
</script>
<?php
$this->import("/layout/footer");