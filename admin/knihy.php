<?php
include '../db/connect.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#kniznice">Index</a></li>
                <li><a data-toggle="pill" href="#new_library">Pridat novu kniznicu</a></li>
                <li><a  href="../books/search.php" target="_blank">Hladat knihy</a></li>
            </ul>
        </div>

        <div class="tab-content noborder col-lg-9">

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

            <!-- PRIDAT KNIZNICU TAB -->
            <div id="new_library" class="tab-pane fade">
                <form id="add_library" class="form-horizontal" action="add_library.php" method="post">

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="lib_name">Nazov kniznice:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="lib_name" name="lib_name" placeholder="Nazov kniznice">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="ip">IP adresa servera:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="ip" name="ip" placeholder="IP adresa servera">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="format">Format:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="format" name="format" placeholder="Format">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="db_name">Nazov databazy:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="db_name" name="db_name" placeholder="Nazov databazy">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="port">Port:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="port" name="port" placeholder="Port">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-success">Pridat novu kniznicu</button>
                        </div>
                    </div>
                </form>

                <script type='text/javascript'>
                    /* attach a submit handler to the form */
                    $("#add_library").submit(function(event) {

                        /* stop form from submitting normally */
                        event.preventDefault();

                        /* get the action attribute from the <form action=""> element */
                        var $form = $( this ),
                            url = $form.attr( 'action' );

                        /* Send the data using post with element id name and name2*/
                        var posting = $.post( url, { lib_name: $('#lib_name').val(), ip: $('#ip').val(), format: $('#format').val(), db_name: $('#db_name').val(), port: $('#port').val() } );

                        /* Alerts the results */
                        posting.done(function( data ) {
                            alert('Kniznica bola uspesne pridana.');
                            $('#knihy').click(function() {
                                location.reload();
                            });
                            window.location.replace(window.location);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>