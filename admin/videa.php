<?php
include '../db/connect.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#video_cat">Video kategorie</a></li>
                <li><a data-toggle="pill" href="#new_vcat">Pridat novu kategoriu</a></li>
                <li><a data-toggle="pill" href="#new_channel">Pridat novy kanal</a></li>
                <li><a data-toggle="pill" href="#new_video">Pridat nove video</a></li>
            </ul>
        </div>

        <div class="tab-content noborder col-sm-8 col-md-8">

            <!-- VIDEO CAT TAB -->
            <div id="video_cat" class="tab-pane fade in active">
                <h4>Video kategorie</h4>
                <table id="video_categories" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nazov kategorie</th>
                        <th>Obrazok kategorie</th>
                        <th>Upravy</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $video_cat_list = "SELECT * FROM video_category";
                    $result = mysqli_query($conn, $video_cat_list);
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $cat_name = $row['name'];
                        $image_path = $row['image_path'];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $cat_name; ?></td>
                            <td><?php echo "<img src='$image_path' alt='' />"; ?></td>
                            <td>
                                <span class='delete_video_cat' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
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
                        $('.delete_video_cat').click(function(){
                            var el = this;
                            var id = this.id;
                            var splitid = id.split("_");

                            // Delete id
                            var deleteid = splitid[1];

                            // AJAX Request
                            $.ajax({
                                url: 'delete_video_cat.php',
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

            <!-- PRIDAT SEARCH CAT-->
            <div id="new_vcat" class="tab-pane fade">
                <p class="vcat_statusMsg"></p>
                <form id="add_vcat" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">Nazov video kategorie:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="napr.: Rozpravky" required />
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
                        $("#add_vcat").on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'add_vcat.php',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    $('.submitBtn').attr("disabled","disabled");
                                    $('#add_vcat').css("opacity",".5");
                                },
                                success: function(msg){
                                    $('.vcat_statusMsg').html('');
                                    if(msg == 'ok'){
                                        $('#videa').click(function() {
                                            location.reload();
                                        });
                                        $('#add_vcat')[0].reset();//reset all textfields...
                                        $('.vcat_statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                                    }else{
                                        $('.vcat_statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                                    }
                                    $('#add_vcat').css("opacity","");
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

            <!-- PRIDAT NOVY KANAL-->
            <div id="new_channel" class="tab-pane fade">

                <p class="channel_statusMsg"></p>
                <form id="add_channel" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-sm-7" for="channel_name">Vlastny nazov kanalu (zobrazuje sa len v administracii):</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="channel_name" name="channel_name" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-7" for="ytb_id">ID Youtube kanalu:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="ytb_id" name="ytb_id"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-7 col-sm-10">
                            <input type="submit" name="submit" class="btn btn-success channel_submitBtn"  value="Pridat kanal" />
                        </div>
                    </div>
                </form>

                <script>
                    $(document).ready(function(e){
                        $("#add_channel").on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'add_channel.php',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    $('.channel_submitBtn').attr("disabled","disabled");
                                    $('#add_channel').css("opacity",".5");
                                },
                                success: function(msg){
                                    $('.channel_statusMsg').html('');
                                    if(msg == 'ok'){
                                        $('#videa').click(function() {
                                            location.reload();
                                        });
                                        $('#add_channel')[0].reset();//reset all textfields...
                                        $('.channel_statusMsg').html('<span style="font-size:18px;color:#34A853">Kanal pridany.</span>');
                                    }else{
                                        $('.channel_statusMsg').html('<span style="font-size:18px;color:#EA4335">Nastala nejaka chyba, skus znovu.</span>');
                                    }
                                    $('#add_channel').css("opacity","");
                                    $(".channel_submitBtn").removeAttr("disabled");
                                }
                            });
                        });
                    });
                </script>


                <h4>Zoznam Youtube kanalov</h4>

                <table id="channellist" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Oficialny banner kanalu</th>
                        <th>Upravy</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $channel_list = "SELECT * FROM video_channels";
                    $result = mysqli_query($conn, $channel_list);
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $banner_path = $row['banner_path'];
                        ?>
                        <tr>
                            <td><?php echo "<img src=$banner_path alt='' title=$name class='img-responsive banner'>"; ?></td>
                            <td>
                                <span class='delete_filter' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
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
                        $('.delete_filter').click(function(){
                            var el = this;
                            var id = this.id;
                            var splitid = id.split("_");

                            // Delete id
                            var deleteid = splitid[1];

                            // AJAX Request
                            $.ajax({
                                url: 'delete_filter.php',
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

            <!-- PRIDAT NOVE VIDEO-->
            <div id="new_video" class="tab-pane fade">

                <p class="video_statusMsg"></p>
                <form id="add_video" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-sm-7" for="video_id">ID Youtube videa:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="video_id" name="video_id" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-7" for="video_kategoria">Zarad video do kategorie:</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="video_kategoria" name="video_kategoria">
                                <?php
                                $cat = "SELECT * FROM video_category";
                                $result = mysqli_query($conn, $cat);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    echo "<option value=$id>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-7 col-sm-10">
                            <input type="submit" name="submit" class="btn btn-success video_submitBtn"  value="Pridat video" />
                        </div>
                    </div>
                </form>

                <script>
                    $(document).ready(function(e){
                        $("#add_video").on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: 'add_video.php',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    $('.video_submitBtn').attr("disabled","disabled");
                                    $('#add_video').css("opacity",".5");
                                },
                                success: function(msg){
                                    $('.video_statusMsg').html('');
                                    if(msg == 'ok'){
                                        $('#videa').click(function() {
                                            location.reload();
                                        });
                                        $('#add_video')[0].reset();//reset all textfields...
                                        $('.video_statusMsg').html('<span style="font-size:18px;color:#34A853">Video pridane.</span>');
                                    }else{
                                        $('.video_statusMsg').html('<span style="font-size:18px;color:#EA4335">Nastala nejaka chyba, skus znovu.</span>');
                                    }
                                    $('#add_video').css("opacity","");
                                    $(".video_submitBtn").removeAttr("disabled");
                                }
                            });
                        });
                    });
                </script>

                <!--
                <h4>Zoznam Youtube kanalov</h4>

                <table id="channellist" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Oficialny banner kanalu</th>
                        <th>Upravy</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $channel_list = "SELECT * FROM video_channels";
                    $result = mysqli_query($conn, $channel_list);
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $banner_path = $row['banner_path'];
                        ?>
                        <tr>
                            <td><?php echo "<img src=$banner_path alt='' title=$name class='img-responsive banner'>"; ?></td>
                            <td>
                                <span class='delete_filter' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
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
                        $('.delete_filter').click(function(){
                            var el = this;
                            var id = this.id;
                            var splitid = id.split("_");

                            // Delete id
                            var deleteid = splitid[1];

                            // AJAX Request
                            $.ajax({
                                url: 'delete_filter.php',
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
                -->
            </div>

        </div>
    </div>
</div>