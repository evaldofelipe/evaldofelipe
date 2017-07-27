 <?php
 	
 	include ("../conexao/conexao.php");

    $query = "SELECT id, name, country, profession, mensage, img, aproved FROM testmonial";
    $dados = mysql_query($query, $conexao) or die(mysql_error());  
    $linha = mysql_fetch_assoc($dados); 
    $total = mysql_num_rows($dados);  


  if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'reprovar') {
    $idTestimonial = $_REQUEST['id'];
    $query = "DELETE FROM `evaldofe_jurere`.`testmonial` WHERE `testmonial`.`id` = '".$idTestimonial."';";
    mysql_query($query)  or die(mysql_error());
  }
  if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'aprovar') {
    $idTestimonial = $_REQUEST['id'];
    $query = "UPDATE testmonial SET aproved='1' WHERE id='".$idTestimonial."';";
    mysql_query($query)  or die(mysql_error());
  }
    
?>


<div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tesmonials
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <?php 
               
                $i =0;
                while($data = mysql_fetch_array($dados)):

                  ?>

<div class="col-lg-5">
   <img class="img_test img-circle foto_test" src="../<?=$data['img']?>">

   
   <p style="  word-wrap: break-word;"><?=$data['mensage']?></p>
   <br>
   <h6><?=$data['name']?></h6>
   <h6><?=$data['profession']?></h6>
   <h6><?=$data['country']?></h6>

   <?php
    if($data['aproved']==0){
   ?>
   <a href="?action=aprovar&id=<?=$data['id']?>">Aprovar</a>
   <a href="?action=reprovar&id=<?=$data['id']?>">Reprovar</a>
   <?php
    }else{
  ?>
      <a href="?action=reprovar&id=<?=$data['id']?>">Remover</a>
    <?php
    }
   ?>
   <hr>

   </div>
 				<?php 
               
                $i++;
                endwhile;
                ?>

  
