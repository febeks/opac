<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kniznica pre deti</title>
        <?php include 'head.php'; ?>
        <script>
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                }
            }

            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function showPosition(position) {

                setCookie("latitude", position.coords.latitude, 1);
                setCookie("longitude", position.coords.longitude, 1);

                console.log(position.coords.latitude, position.coords.longitude);

            }
            getLocation();
        </script>
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

            <!--KALENDAR HOME -->
            <div class="col-xs-12 col-sm-12 col-md-6 panel panel-warning">
                <div class="panel-heading">Kalendár podujatí v knižniciach</div>
                <div class="panel-body">
                    <table>
                        <thead>
                            <th class="col-xs-4 col-sm-4 col-md-5">Názov podujatia</th>
                            <th class="col-xs-4 col-sm-4 col-md-4">Knižnica</th>
                            <th class="col-xs-4 col-sm-4 col-md-3">Dátum a čas</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-xs-4 col-sm-4 col-md-5">Učíme sa angličtinu</td>
                                <td class="col-xs-4 col-sm-4 col-md-4">Ružinov</td>
                                <td class="col-xs-4 col-sm-4 col-md-3">15:00</td>
                            </tr>
                            <tr>
                                <td class="col-xs-4 col-sm-4 col-md-5">Príheby z lesa</td>
                                <td class="col-xs-4 col-sm-4 col-md-4">Pieštany</td>
                                <td class="col-xs-4 col-sm-4 col-md-3">17:30</td>
                            </tr>
                            <tr>
                                <td class="col-xs-4 col-sm-4 col-md-5">Púšťame si šarkana</td>
                                <td class="col-xs-4 col-sm-4 col-md-4">Banská Bystrica</td>
                                <td class="col-xs-4 col-sm-4 col-md-3">16:00</td>
                            </tr>
                            <tr>
                                <td class="col-xs-4 col-sm-4 col-md-5">Posedenie s poľovníkom</td>
                                <td class="col-xs-4 col-sm-4 col-md-4">Malacky</td>
                                <td class="col-xs-4 col-sm-4 col-md-3">15:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-xs-10 col-sm-12 col-md-6 panel panel-warning">
                <div class="panel-heading">Harmonogram virtuálnej reality</div>
                <div class="panel-body">
                    <table>
                        <thead>
                        <th class="col-xs-4 col-sm-4 col-md-5">Knižnica</th>
                        <th class="col-xs-4 col-sm-4 col-md-3">Miestnosť</th>
                        <th class="col-xs-4 col-sm-4 col-md-5">Dátum a čas</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="col-xs-6 col-sm-6 col-md-4">Malacky</td>
                            <td class="col-xs-6 col-sm-6 col-md-3">3C</td>
                            <td class="col-xs-6 col-sm-6 col-md-5">10:00 - 16:00</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6 col-sm-6 col-md-4">Pieštany</td>
                            <td class="col-xs-6 col-sm-6 col-md-3">3.05</td>
                            <td class="col-xs-6 col-sm-6 col-md-5">10:00 - 16:00</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6 col-sm-6 col-md-4">Banská Bystrica</td>
                            <td class="col-xs-6 col-sm-6 col-md-3">5.02</td>
                            <td class="col-xs-6 col-sm-6 col-md-5">9:00 - 13:00</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6 col-sm-6 col-md-4">SNK v Martine</td>
                            <td class="col-xs-6 col-sm-6 col-md-3">2A, 2B</td>
                            <td class="col-xs-6 col-sm-6 col-md-5">10:00 - 15:00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="container-fluid text-center">
        <p><a href="./admin/" target="_blank"> Administrácia </a></p>
    </footer>

    <script src="js/carousel.js"></script>
    </body>
</html>


