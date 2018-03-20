<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/login.css">

    <title>Login</title>
</head>
<body>
<div class="jumbotron vertical-center">
    <div class="container">
        <div class="row">
                <form method="post" action="secure.php" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="user">Username:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="user">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="user">Password:</label>
                        <div class="col-sm-2">
                            <input type="password" class="form-control" name="pass">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-success">Log in</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
</body>
</html>
