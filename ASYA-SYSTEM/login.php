<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-theme.css">

    <title>Log-In</title>
</head>
<body>


<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="asyalogo.jpg" /> </a>
        </div>
    </div>
</div>

<!-- login panel -->
<div class="container col-md-4 col-md-offset-4">
    <div class="panel panel-default" id="panel-login">
        <div class="panel-heading"><h3 class="text-center">Welcome</h3></div>
        <div class="panel-body">
            <form role="form">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
            </form>
        </div>
        <div class="panel-footer text-center">
            <a href="home.php" class="btn btn-primary">Log-In</a>
        </div>
    </div>
</div>

</body>
</html>