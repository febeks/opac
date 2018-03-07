<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Insert this code before your </body> tag -->
    <script src="//static.miniclipcdn.com/js/game-embed.js"></script>

    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/mobile.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="menu hidden-xs hidden-sm">
                    <a href="../index.php" ><img src="../images/menu.png" alt="" class="img-responsive"/></a>

                    <a href="game.php"><img id="joystick" src="../images/joystick.png" alt="" class="img-responsive shaky"/></a>
                    <a href="#"><img id="sova" src="../images/sova.png" alt="" class="img-responsive shaky"/></a>
                    <a href="#"><img id="youtube" src="../images/youtube.png" alt="" class="img-responsive shaky"/></a>
                </div>

                <div class="mob-menu hidden-md hidden-lg">
                    <div class="col-xs-3">
                        <a href="../index.php"><img src="../images/dom.png" alt="" class="img-responsive"/></a>
                    </div>
                    <div class="col-xs-3">
                        <a href="game.php" data-toggle="tab"><img id="joystick-mob" src="../images/joystick.png" alt="" class="img-responsive shaky"/></a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" data-toggle="tab"><img id="sova-mob" src="../images/sova.png" alt="" class="img-responsive shaky"/></a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" data-toggle="tab"><img id="youtube-mob" src="../images/youtube.png" alt="" class="img-responsive shaky"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tab-content">
        <!-- HOMEPAGE -->
        <div id="homepage" class="tab-pane active container">
            <!--HRY-->
            <div class="panel panel-primary">
                <?php include "select_all_games.php"; ?>
            </div>

        </div>
    </div>
</body>
</html>
