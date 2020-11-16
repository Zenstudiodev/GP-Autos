<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="f1Dewc9q9O7O2zFd2pN7CfGvXMa37FIRIP8nbnoy">

    <meta name="api-base-url" content="https://webapi.forcesos.com/">

    <title>Client Api</title>

    <!-- Styles -->
    <link href="https://webapi.forcesos.com/css/app.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="shortcut icon" href="https://webapi.forcesos.com/images/favicon.ico" type="image/x-icon">

    <!-- Icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Api token -->
    <meta name="api-token" content="">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="https://webapi.forcesos.com">
                    &nbsp;<img src="https://webapi.forcesos.com/images/ForceSOS-LogoBlack.png" alt="">

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="https://webapi.forcesos.com/login">Iniciar sesión</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="https://webapi.forcesos.com/login">
                            <input type="hidden" name="_token" value="f1Dewc9q9O7O2zFd2pN7CfGvXMa37FIRIP8nbnoy">

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">ID Corporativo</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="" required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Clave</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar sesión
                                    </button>

                                    <a class="btn btn-link" href="https://webapi.forcesos.com/password/reset">
                                        &#191;Olvidaste tu contraseña?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<!-- Scripts -->
<script src="https://webapi.forcesos.com/js/app.js"></script>
</body>
</html>