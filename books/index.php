<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Insert this code before your </body> tag -->
    <script src="//static.miniclipcdn.com/js/game-embed.js"></script>
    <script
            src="https://code.jquery.com/jquery-1.3.2.js"
            integrity="sha256-IzpdFr7lpkvzvBmr48yBKh4GGUNfAcFj9ih3Okaf9xk="
            crossorigin="anonymous"></script>
    <link href="../css/jquery_scroller.css" type="text/css" rel="stylesheet" />
    <script src="../js/jquery_scroller.js" type="text/javascript"></script>

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

                <a href="../games/game.php"><img id="joystick" src="../images/joystick.png" alt="" class="img-responsive shaky"/></a>
                <a href="index.php"><img id="sova" src="../images/sova.png" alt="" class="img-responsive shaky"/></a>
                <a href="../videos/index.php"><img id="youtube" src="../images/youtube.png" alt="" class="img-responsive shaky"/></a>
            </div>

            <div class="mob-menu hidden-md hidden-lg">
                <div class="col-xs-3">
                    <a href="../index.php"><img src="../images/dom.png" alt="" class="img-responsive"/></a>
                </div>
                <div class="col-xs-3">
                    <a href="https://play.google.com/store/apps/category/FAMILY"><img id="joystick-mob" src="../images/joystick.png" alt="" class="img-responsive shaky"/></a>
                </div>
                <div class="col-xs-3">
                    <a href="index.php"><img id="sova-mob" src="../images/sova.png" alt="" class="img-responsive shaky"/></a>
                </div>
                <div class="col-xs-3">
                    <a href="../videos/index.php"><img id="youtube-mob" src="../images/youtube.png" alt="" class="img-responsive shaky"/></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="tab-content">
    <div id="homepage" class="tab-pane active container">
        <!--HRY-->
        <div class="panel panel-primary">
            <?php include "select_categories.php"; ?>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="container text-center">
    <p><a href="../admin/" target="_blank"> Administrácia </a></p>
</footer>
<script>
    $('#knihy').scroller({ direction: 'vertical' });
</script>
</body>
</html>
