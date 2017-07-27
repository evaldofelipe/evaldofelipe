   <?php
  
  include ("../conexao/conexao.php");

    $query = "SELECT id, title, content, day, img FROM events";
    $dados = mysql_query($query, $conexao) or die(mysql_error());  
    //$linha = mysql_fetch_assoc($dados); 
    //$total = mysql_num_rows($dados); 
    
?>

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Events
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

              <div class="row">

              <div class="col-lg-12">
                  
                <?php 
               
                $i =0;
                while($data = mysql_fetch_array($dados)):

                  ?>

            <form name="input" action="_events.php" method="post" enctype='multipart/form-data'>
              <input type="hidden" value="<?=$data['id']?>"/>
              <input type="button" value="Delete" name="delete"/>
            </form>

            <div class="col-lg-12">
            <h3><?=$data['title']?></h3>
            <h5><?=$data['day']?></h5>
              <p style="  word-wrap: break-word;"><?=$data['content']?></p>
            </div>

            <div class="col-lg-12">
              <img class="foto_event" src="<?=$data['img']?>">
              <div class="bar"></div>
            </div>
           

             <?php 
               
                $i++;
                endwhile;
                ?>

              </div>




                    <div class="col-lg-6">
                    <br>

                        <form name="input" action="_events.php" method="post" enctype='multipart/form-data'>

                            <div class="form-group">

                                <label>Event Title</label>
                                <input class="form-control" name="title">
                            </div>

                            <div class="form-group">

                                <label>Event day</label>
                                <input class="form-control" name="day">
                            </div>

                            <div class="form-group">
                                <label>Event descript</label>
                                <textarea class="form-control" rows="3" name="content"></textarea>
                                <div class="form-group">

                                <label>Event picture</label>
                                 <input type="file" name="foto">
                            </div>
                               
                            </div>
                            <button type="submit" class="btn btn-default">Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>



                            





                            <hr>


<?php


 if ($_POST) {
   
  print_r($_POST);
   
  include ("conexao/conexao.php");


  $title        = $_POST['title'];
  $content      = $_POST['content'];
  $day          = $_POST['day'];
  $img         = "../img/events/".str_replace(' ', '', $_FILES['foto']['name']);

  move_uploaded_file($_FILES['foto']['tmp_name'], $img);


  $query = "INSERT INTO events (title, content, day, img) VALUES ('".$title."', '".$content."', '".$day."', '".$img."')";

  
   mysql_query($query)  or die(mysql_error()) ;



 }

 ?> 
               



                         

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
