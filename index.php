<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kniznica pre deti</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/carousel.css">
        <link rel="stylesheet" href="css/homepage.css">
        <link rel="stylesheet" href="css/mobile.css">

    </head>
    <body>
    <!-- HEADER -->
    <div class="container"><?php include 'header.php'; ?></div>
    <div class="tab-content">
        <!-- HOMEPAGE -->
        <div id="homepage" class="tab-pane active container">
            <!--HRY HOME-->
            <div class="panel panel-primary">
                <div class="panel-heading">Hry</div>
                <div class="panel-body">

                    <div class="col-md-12">
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
                            <div class="carousel-inner">
                                <?php include './games/index.php'; ?>
                            </div>
                                <!-- Controls -->
                                <div class="left carousel-control">
                                    <a href="#carousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </div>
                                <div class="right carousel-control">
                                    <a href="#carousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- KNIHY HOME -->
            <div class="panel panel-success">
                <div class="panel-heading">Knihy</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 hidden-xs">
                            <div class="carousel slide multi-item-carousel" id="theCarousel2">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel2" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel2" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-12 visible-xs">
                            <div class="carousel slide multi-item-carousel-mob" id="theCarousel2m">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel2m" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel2m" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--VIDEA HOME -->
            <div class="panel panel-danger">
                <div class="panel-heading">Videa</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 hidden-xs">
                            <div class="carousel slide multi-item-carousel" id="theCarousel3">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel3" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel3" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-12 visible-xs">
                            <div class="carousel slide multi-item-carousel-mob" id="theCarousel3m">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel3m" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel3m" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HRY -->
        <div id="hry" class="tab-pane container">
            <div class="panel panel-primary">
                <div class="panel-heading">Hry</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 hidden-xs">
                            <div class="carousel slide multi-item-carousel" id="theCarousel4">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel4" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel4" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>

                        <div class="col-xs-12 visible-xs">
                            <div class="carousel slide multi-item-carousel-mob" id="theCarousel4m">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel4m" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel4m" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- KNIHY -->
        <div id="knihy" class="tab-pane container">
            <div class="panel panel-primary">
                <div class="panel-heading">Knihy</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 hidden-xs">
                            <div class="carousel slide multi-item-carousel" id="theCarousel5">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel5" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel5" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>

                        <div class="col-xs-12 visible-xs">
                            <div class="carousel slide multi-item-carousel-mob" id="theCarousel5m">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel5m" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel5m" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!-- VIDEA -->
        <div id="videa" class="tab-pane container">
            <div class="panel panel-primary">
                <div class="panel-heading">Videa</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 hidden-xs">
                            <div class="carousel slide multi-item-carousel" id="theCarousel6">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel6" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel6" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>

                        <div class="col-xs-12 visible-xs">
                            <div class="carousel slide multi-item-carousel-mob" id="theCarousel6m">
                                <div class="carousel-inner">


                                    <!--  Example item end -->
                                </div>
                                <a class="left carousel-control" href="#theCarousel6m" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                <a class="right carousel-control" href="#theCarousel6m" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer>

    <script src="js/carousel.js"></script>
    <script src="js/tabs.js"></script>
    </body>
</html>


