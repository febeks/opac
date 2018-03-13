<?php
    include '../db/connect.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#index">Index</a></li>
                <li><a data-toggle="pill" href="#kat">Kategorie</a></li>
                <li><a data-toggle="pill" href="#new_game">Pridat novu hru</a></li>
            </ul>
        </div>

       <div class="tab-content noborder col-lg-9">

           <!-- INDEX TAB -->
           <div id="index" class="tab-pane fade in active">
               <h4>Zoznam hier</h4>
               <table id="gamelist" class="table table-hover">
                   <thead>
                   <tr>
                       <th>#ID</th>
                       <th>Nazov hry</th>
                       <th>Nastroje</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $game_list = "SELECT * FROM game";
                   $result = mysqli_query($conn, $game_list);
                   while($row = mysqli_fetch_assoc($result)) {
                       $id = $row['game_id'];
                       $name = $row['name'];
                       ?>
                                   <tr>
                                       <td><?php echo $id; ?></td>
                                       <td><?php echo $name; ?></td>
                                       <td>
                                           <span class='delete_game' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
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
                       $('.delete_game').click(function(){
                           var el = this;
                           var id = this.id;
                           var splitid = id.split("_");

                           // Delete id
                           var deleteid = splitid[1];

                           // AJAX Request
                           $.ajax({
                               url: 'delete_game.php',
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

           <!-- KATEGORIE TAB -->
           <div id="kat" class="tab-pane fade">
               <div class="col-sm-12">
                   <form id="add_category" class="form-horizontal" action="add_category.php" method="post">
                       <div class="form-group">
                           <label class="control-label col-sm-2" for="name">Nazov kategorie:</label>
                           <div class="col-sm-3">
                               <input type="text" class="form-control" id="name" name="name" placeholder="Zadajte nazov kategorie">
                           </div>

                           <div class="col-sm-2">
                               <button type="submit" class="btn btn-success">Pridat novu kategoriu</button>
                           </div>
                       </div>
                   </form>

                   <script type='text/javascript'>
                       /* attach a submit handler to the form */
                       $("#add_category").submit(function(event) {

                           /* stop form from submitting normally */
                           event.preventDefault();

                           /* get the action attribute from the <form action=""> element */
                           var $form = $( this ),
                               url = $form.attr( 'action' );

                           /* Send the data using post with element id name and name2*/
                           var posting = $.post( url, { name: $('#name').val() } );

                           /* Alerts the results */
                           posting.done(function( data ) {
                               alert('Kategoria bola uspesne pridana.');
                               $('#hry').click(function() {
                                   location.reload();
                               });
                               window.location.replace(window.location);
                           });
                       });
                   </script>
               </div>

               <div class="col-sm-12">
                   <table id="catlist" class="table table-hover">
                       <thead>
                       <tr>
                           <th>#ID</th>
                           <th>Nazov kategorie</th>
                           <th>Nastroje</th>
                       </tr>
                       </thead>
                       <tbody>
                       <?php
                       $cat_list = "SELECT * FROM games_category";
                       $result = mysqli_query($conn, $cat_list);
                       while($row = mysqli_fetch_assoc($result)) {
                           $id = $row['id'];
                           $name = $row['name'];
                           ?>
                           <tr>
                               <td><?php echo $id; ?></td>
                               <td><?php echo $name; ?></td>
                               <td>
                                   <span class='delete_game_cat' id='del_<?php echo $id; ?>'><img src="../images/remove.png" alt="" title="Zmazat" class="icon"/></span>
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
                           $('.delete_game_cat').click(function(){
                               var el = this;
                               var id = this.id;
                               var splitid = id.split("_");

                               // Delete id
                               var deleteid = splitid[1];

                               // AJAX Request
                               $.ajax({
                                   url: 'delete_game_cat.php',
                                   type: 'POST',
                                   data: { id:deleteid },
                                   success: function(response){
                                        if(response==='ok'){
                                           // Removing row from HTML Table
                                           $(el).closest('tr').css('background','tomato');
                                           $(el).closest('tr').fadeOut(600, function(){
                                               $(this).remove();
                                           });
                                        }else if(response==='error'){
                                            alert("Tato kategoria nemoze byt zmazana!");
                                        }
                                   }
                               });
                           });
                       });
                   </script>
               </div>
           </div>

           <!-- PRIDAT HRU TAB -->
           <div id="new_game" class="tab-pane fade">
               <form id="add_game" class="form-horizontal" action="add_game.php" method="post">
                   <div class="form-group">
                       <label class="control-label col-sm-2" for="title">Nazov hry:</label>
                       <div class="col-sm-3">
                           <input type="text" class="form-control" id="title" name="title" placeholder="Zadajte nazov hry">
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="control-label col-sm-2" for="category_id">Kategoria:</label>
                       <div class="col-sm-3">
                           <select class="form-control" id="category_id" name="category_id">
                               <?php
                               $categories = "SELECT * FROM games_category";
                               $result = mysqli_query($conn, $categories);
                               if (mysqli_num_rows($result) > 0) {
                                   // output data of each row
                                   while($row = mysqli_fetch_assoc($result)) {
                                       echo "<option value=".$row["id"].">".$row["name"]."</option>";
                                   }
                               } else {
                                   echo "No games in database.";
                               }
                               ?>
                           </select>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="control-label col-sm-2" for="embed">Embed kod:</label>
                       <div class="col-sm-10">
                           <textarea class="form-control" id="embed" name="embed" rows="11" placeholder="Vlozte embed kod hry"></textarea>
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-success">Pridat novu hru</button>
                       </div>
                   </div>
               </form>

               <script type='text/javascript'>
                   /* attach a submit handler to the form */
                   $("#add_game").submit(function(event) {

                       /* stop form from submitting normally */
                       event.preventDefault();

                       /* get the action attribute from the <form action=""> element */
                       var $form = $( this ),
                           url = $form.attr( 'action' );

                       /* Send the data using post with element id name and name2*/
                       var posting = $.post( url, { title: $('#title').val(), category_id: $('#category_id').val(), embed: $('#embed').val() } );

                       /* Alerts the results */
                       posting.done(function( data ) {
                           alert('Hra bola uspesne pridana.');
                           $('#hry').click(function() {
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