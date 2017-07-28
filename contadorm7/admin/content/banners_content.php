<?php
  include ("../conexao/conexao.php");
  
  if ($_POST['delete']=='Delete'){
    $idFoto        = $_POST['idFoto'];
    $query = "DELETE FROM `evaldofe_jurere`.`fotos` WHERE `fotos`.`id` = '".$idFoto."';";
    mysql_query($query)  or die(mysql_error());
  }else{

      $evento=$_POST["evento"];
      $dia=$_POST["dia"];
      $mes=$_POST["mes"];
      $comentario=$_POST["comentario"];
      $ano=$_POST["ano"];
      $data=$ano.$mes.$dia;
      $data_cad=date('Y-m-d');
      $data_alt=date('Y-m-d');
      $ip=getenv("REMOTE_ADDR");//Guarda o ip da máquina que insere o anúncio
      $status = "Sim";
      $banner = $_POST["banner"];

    //se existir o arquivo
    if(isset($_FILES["arquivo"]))
    {
      $arquivo = $_FILES["arquivo"];
      $pasta_dir = "arquivos/";//diretorio dos arquivos
      //se não existir a pasta ele cria uma
      if(!file_exists($pasta_dir))
      {
        mkdir($pasta_dir);
      }
      $arquivo_nome = $pasta_dir . $arquivo["name"];
      // Faz o upload da imagem
      move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
      //conecta no banco
      //Gravar o path no banco
      $queryDelete = "DELETE FROM `evaldofe_jurere`.`fotos` WHERE `fotos`.`banner` = '".$banner."';";
      mysql_query($queryDelete)  or die(mysql_error()) ;
      $query = "INSERT INTO fotos VALUES ('', '$banner', '$evento','$comentario','$arquivo_nome','$data','$data_cad','$data_alt','$ip','$status')"; 
      mysql_query($query)  or die(mysql_error()) ;
    }
  }
  $query = "SELECT id, comentario, path FROM fotos";
  $dados = mysql_query($query, $conexao) or die(mysql_error());  
?>
<div id="page-wrapper">



            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Banners (1024x370)
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                <div class="col-lg-12">
                <h3>Banner Home</h3>
                <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '1'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="1"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>

                <div class="col-lg-12">
                <h3>Banner Jurere</h3>
                <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '2'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="2"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>

                <div class="col-lg-12">
                <h3>Banner Services</h3>
                <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '3'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="3"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>

                <div class="col-lg-12">
                <h3>Banner Testmonials</h3>
                 <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '4'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="4"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>

                <div class="col-lg-12">
                <h3>Banner Events</h3>
                <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '5'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="5"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>

                <div class="col-lg-12">
                <h3>Banner Apply</h3>
                <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '6'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="6"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>

                <div class="col-lg-12">
                <h3>Banner Gallery</h3>
                 <?php 
                    $query = "SELECT id, comentario, path FROM fotos WHERE banner = '7'";
                    $dados = mysql_query($query, $conexao) or die(mysql_error());  
                  $i =0;
                  while($data = mysql_fetch_array($dados)):

                ?>
                <img src="<?=$data['path']?>"> 
                <?php 
                   
                  $i++;
                  endwhile;
                ?>
                <hr>
                <form name = "form1" method = "post" action = "_banners.php" enctype = "multipart/form-data">
                    <input type="hidden" name="banner" value="7"/>
                    <input type = "file" name = "arquivo">
                    <input type = "submit" name = "Submit" value = "Upload">
                </form>
                <hr>
                </div>


                               

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
