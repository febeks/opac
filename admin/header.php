<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <link rel="stylesheet" href="styles/admin.css">
    <?php include '../db/connect.php' ?>
    <title>Administracia</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li ><a data-toggle="tab" href="#statistika">Statistika</a></li>
                <li class="active"><a data-toggle="tab" href="#hry">Hry</a></li>
                <li><a data-toggle="tab" href="#knihy">Knihy</a></li>
                <li><a data-toggle="tab" href="#videa">Videa</a></li>
            </ul>

            <div class="tab-content">
                <div id="statistika" class="tab-pane fade ">
                    <?php include 'stats.php' ?>
                </div>
                <div id="hry" class="tab-pane fade in active" >
                    <?php include 'hry.php' ?>
                </div>
                <div id="knihy" class="tab-pane fade">
                    <?php include 'knihy.php' ?>
                </div>
                <div id="videa" class="tab-pane fade">
                    <?php include 'videa.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>