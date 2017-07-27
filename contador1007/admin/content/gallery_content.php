<?php
  include ("../conexao/conexao.php");
  
  if ($_POST['delete']=='Delete'){
    $idFoto        = $_POST['idFoto'];
    $query = "DELETE FROM `evaldofe_1007`.`fotos` WHERE `fotos`.`id` = '".$idFoto."';";
    mysql_query($query)  or die(mysql_error());
  }else{
        //Pegar os dados
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
      $arquivo_nome_grd = $pasta_dir . "grd" . $arquivo["name"];
      echo $arquivo_nome_grd;
      // Faz o upload da imagem
    
      move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
      copy($arquivo_nome, $arquivo_nome_grd);
    //  conecta no banco
     // Gravar o path no banco
      $query = "INSERT INTO fotos VALUES ('', 0, '$evento','$comentario','$arquivo_nome','$data','$data_cad','$data_alt','$ip','$status')"; 
     mysql_query($query)  or die(mysql_error()) ;

    include("content/resize2.php");
    $resizeObj = new resize($arquivo_nome);
    $resizeObj -> resizeImage(325, 183, 0);
    $resizeObj -> saveImage($arquivo_nome, 100);
  
    }
  }
  $query = "SELECT id, comentario, path FROM fotos WHERE banner = 0";
  $dados = mysql_query($query, $conexao) or die(mysql_error());  
?>

<div id="page-wrapper">
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Banners
            </h1>
            
        </div>
    </div>
    <!-- /.row -->
        <div class="row">
          <td width="78%" valign="top"><form name = "form1" method = "post" action = "_gallery.php" enctype = "multipart/form-data">
            <div align="center">
              <p><br>
                    <table width="79%" align="center" cellpadding="1" cellspacing="0">
                      <!-- <tr>
                        <td valign="top"><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Coment&aacute;rio:</font></strong></div>
                            <div align="center"> </div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif">
                          <textarea name="comentario" cols="60" rows="4" id="responsavel8"></textarea>
                        </font></td>
                      </tr> -->
                      <tr>
                        <td colspan="2"><div align="left">
                            <input type = "file" name = "arquivo">
                            <input type = "submit" name = "Submit" value = "Enviar">
                        </div></td>
                      </tr>
                    </table>
                  </div>
                </form></td>
              </tr>
            </table>
          </div>
          <!-- /.row -->

          <div class="row">
            <?php 
               
              $i =0;
              while($data = mysql_fetch_array($dados)):

            ?>
            <div class="col-lg-4">
              <img src="<?=$data['path']?>" />  
              <form name="input" action="_gallery.php" method="post" enctype='multipart/form-data'>
                <input type="hidden" value="<?=$data['id']?>" name="idFoto"/>
                <input type="submit" value="Delete" name="delete"/>
              </form>
            </div>
            <?php 
               
              $i++;
              endwhile;
            ?>
          </div>

          <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
