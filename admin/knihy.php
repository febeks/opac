<?php
include '../db/connect.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#kniznice">Kniznice a Z39.50</a></li>
                <li><a data-toggle="pill" href="#cats">Zoznam kategorii vyhladavania knih</a></li>
                <li><a data-toggle="pill" href="#new_library">Pridat novu kniznicu</a></li>
                <li><a data-toggle="pill" href="#new_search_cat">Pridat novu kategoriu vyhladavania</a></li>
                <li><a  href="../books/search.php" target="_blank">Hladat knihy</a></li>
            </ul>
        </div>

        <div class="tab-content noborder col-sm-8 col-md-8">

            <!-- INDEX TAB -->
            <div id="kniznice" class="tab-pane fade in active">
                <h4>Zoznam kniznic s podporou Z39.50</h4>
                <table id="librarylist" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nazov kniznice</th>
                        <th>IP adresa servera</th>
                        <th>Format zaznamov</th>
                        <th>Meno databazy</th>
                        <th>Port</th>
                        <th>Upravy</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $library_list = "SELECT * FROM library";
                    $result = mysqli_query($conn, $library_list);
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $lib_name = $row['lib_name'];
                        $ip = $row['ip'];
                        $format = $row['format'];
                        $db_name = $row['db_name'];
                        $port = $row['port'];
                        ?>
                        <tr>
                            <td><?php echo $lib_name; ?></td>
                            <td><?php echo $ip; ?></td>
                            <td><?php echo $format; ?></td>
                            <td><?php echo $db_name; ?></td>
                            <td><?php echo $port; ?></td>
                            <td>
                                <span class='delete_library' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function(){
                        // Delete
                        $('.delete_library').click(function(){
                            var el = this;
                            var id = this.id;
                            var splitid = id.split("_");

                            // Delete id
                            var deleteid = splitid[1];

                            // AJAX Request
                            $.ajax({
                                url: 'delete_library.php',
                                type: 'POST',
                                data: { id:deleteid },
                                success: function(response){

                                    // Removing row from HTML Table
                                    $(el).closest('tr').css('background','tomato');
                                    $(el).closest('tr').fadeOut(600, function(){
                                        $(this).remove();
                                    });
                                }
                            });
                        });
                    });
                </script>
            </div>

            <!-- CATEGORY TAB -->
            <div id="cats" class="tab-pane fade">
                <h4>Kategorie vyhladavania knih pre deti</h4>
                <table id="catlist" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nazov kategorie</th>
                        <th>Klucove slova</th>
                        <th>Obrazok kategorie</th>
                        <th>Upravy</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cat_list = "SELECT * FROM book_cat";
                    $result = mysqli_query($conn, $cat_list);
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $keywords = $row['keywords'];
                        $image_path = $row['image_path'];
                        ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $keywords; ?></td>
                            <td><?php echo "<img src='$image_path' alt='' />"; ?></td>
                            <td>
                                <span class='delete_search_cat' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function(){
                        // Delete
                        $('.delete_search_cat').click(function(){
                            var el = this;
                            var id = this.id;
                            var splitid = id.split("_");

                            // Delete id
                            var deleteid = splitid[1];

                            // AJAX Request
                            $.ajax({
                                url: 'delete_search_cat.php',
                                type: 'POST',
                                data: { id:deleteid },
                                success: function(response){

                                    // Removing row from HTML Table
                                    $(el).closest('tr').css('background','tomato');
                                    $(el).closest('tr').fadeOut(600, function(){
                                        $(this).remove();
                                    });
                                }
                            });
                        });
                    });
                </script>
            </div>

            <!-- PRIDAT KNIZNICU TAB -->
            <div id="new_library" class="tab-pane fade">
                <p class="kniznicaStatusMsg"></p>
                <form id="add_library" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="lib_name">Nazov kniznice:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="lib_name" name="lib_name" placeholder="Nazov kniznice" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="ip">IP adresa servera:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="ip" name="ip" placeholder="IP adresa servera" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="format">Format:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="format" name="format" placeholder="Format" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="db_name">Nazov databazy:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="db_name" name="db_name" placeholder="Nazov databazy" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="port">Port:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="port" name="port" placeholder="Port" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <input type="submit" name="submit" class="btn btn-success submitBtn" value="Pridat novu kniznicu" />
                        </div>
                    </div>
                </form>


                <script>
                    $(document).ready(function(e){
                        $("#add_library").on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'add_library.php',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    $('.submitBtn').attr("disabled","disabled");
                                    $('#add_library').css("opacity",".5");
                                },
                                success: function(msg){
                                    $('.kniznicaStatusMsg').html('');
                                    if(msg == 'ok'){
                                        $('#knihy').click(function() {
                                            location.reload();
                                        });
                                        $('#add_library')[0].reset();//reset all textfields...
                                        $('.kniznicaStatusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                                    }else{
                                        $('.kniznicaStatusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                                    }
                                    $('#add_library').css("opacity","");
                                    $(".submitBtn").removeAttr("disabled");
                                }
                            });
                        });

                        $("#port").change(function() {
                            if (!($.isNumeric($('#port').val()))) {
                                alert('Hodnota v poli Port musi byt cislo!');
                            }
                        });
                    });
                </script>
            </div>

            <!-- PRIDAT SEARCH CAT-->
            <div id="new_search_cat" class="tab-pane fade">
                <p class="statusMsg"></p>
                <form id="add_search_cat" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">Nazov predmetovej kategorie:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="napr.: zvierata, abeceda, cisla" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="keywords">Klucove slova:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Klucove slova vystihujuce kategoriu oddelene ciarkou, napr.: auto,traktor,motorka" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="image_path">Obrazok kategorie:</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control-file" id="image_path" name="image_path" placeholder="Obrazok vystihujuci kategoriu" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <input type="submit" name="submit" class="btn btn-success submitBtn"  value="Pridat kategoriu" />
                        </div>
                    </div>
                </form>

                <script>
                    $(document).ready(function(e){
                        $("#add_search_cat").on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'add_search_cat.php',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    $('.submitBtn').attr("disabled","disabled");
                                    $('#add_search_cat').css("opacity",".5");
                                },
                                success: function(msg){
                                    $('.statusMsg').html('');
                                    if(msg == 'ok'){
                                        $('#knihy').click(function() {
                                            location.reload();
                                        });
                                        $('#add_search_cat')[0].reset();//reset all textfields...
                                        $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                                    }else{
                                        $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                                    }
                                    $('#add_search_cat').css("opacity","");
                                    $(".submitBtn").removeAttr("disabled");
                                }
                            });
                        });

                        //file type validation
                        $("#image_path").change(function() {
                            var file = this.files[0];
                            var imagefile = file.type;
                            var match= ["image/jpeg","image/png","image/jpg"];
                            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                                alert('Please select a valid image file (JPEG/JPG/PNG).');
                                $("#image_path").val('');
                                return false;
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>