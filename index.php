<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kniznica pre deti</title>
        <?php include 'head.php'; ?>

    </head>
    <body>
    <!-- HEADER -->
    <div class="container">
        <?php include 'header.php'; ?>
    </div>
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
            <!--VIDEA HOME -->
            <div class="panel panel-danger">
                <div class="panel-heading">Videa</div>
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


