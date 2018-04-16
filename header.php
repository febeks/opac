<?php
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
?>

    <div class="row">
        <div class="col-xs-12">
            <div class="menu hidden-xs hidden-sm">
                <a href="./index.php" ><img src="./images/menu.png" alt="" class="img-responsive"/></a>

                    <a href="./games/game.php"><img id="joystick" src="./images/joystick.png" alt="" class="img-responsive shaky"/></a>
                    <a href="./books/index.php"><img id="sova" src="./images/sova.png" alt="" class="img-responsive shaky"/></a>
                   <a href="./videos/index.php"><img id="youtube" src="./images/youtube.png" alt="" class="img-responsive shaky"/></a>
            </div>

            <div class="mob-menu hidden-md hidden-lg">
                <div class="col-xs-3">
                    <a href="index.php"><img src="./images/dom.png" alt="" class="img-responsive"/></a>
                </div>
                <div class="col-xs-3">
                    <?php
                        if( $iPod || $iPhone || $iPad){
                        //browser reported as an iPhone/iPod touch
                        $url = "https://itunes.apple.com/us/genre/ios-games-family/id7009?mt=8";
                        }else if($Android){
                        //browser reported as an Android device
                        $url = "https://play.google.com/store/apps/category/FAMILY";
                        }else{
                        //browser reported as other device
                        $url = "https://play.google.com/store/apps/category/FAMILY";
                        }
                    ?>
                    <a href="<?php echo $url; ?>"><img id="joystick-mob" src="./images/joystick.png" alt="" class="img-responsive shaky"/></a>
                </div>
                <div class="col-xs-3">
                    <a href="./books/index.php"><img id="sova-mob" src="./images/sova.png" alt="" class="img-responsive shaky"/></a>
                </div>
                <div class="col-xs-3">
                    <a href="./videos/index.php"><img id="youtube-mob" src="./images/youtube.png" alt="" class="img-responsive shaky"/></a>
                </div>
            </div>
        </div>
    </div>
