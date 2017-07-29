<html>

<?php
    include ("conexao/conexao.php");
?> 

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">
</head>
<body style="background:none transparent;">
    <header id="myCarousel" class="carousel slide">

    <div class="carousel-inner">

    <div  class="item active">
                <div class="fill" style="background-image:url('img/null.png');"></div>  
    </div>

     
    <?php 
    $query = "SELECT id, comentario, path FROM fotos WHERE banner = 0";
    $dados = mysql_query($query, $conexao) or die(mysql_error());  
    $i =0;
    while($data = mysql_fetch_array($dados)):
      $urlGrd = str_replace("arquivos/", "arquivos/grd", $data['path']);
  ?>
       
     <div  class="item">
                <div class="fill" style="background-image:url('admin/<?=$urlGrd?>');"></div>  
        </div>

            <?php 
              $i++;
              endwhile;
            ?>
    </div>




        
    </header>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>
    $( ".carousel" ).hover(
            function() {
                $( "#"+this.id ).carousel({
                    interval: 5000,
                    pause: 'none'
                });
            }, function() {
                $( "#"+this.id ).carousel('pause'); 
            }
    );
    </script>

    <script>
  var youtubeReady = false;

  function onYouTubeIframeAPIReady(){
    youtubeReady = true;
  }

  $('.carousel').on('slide', function(){
    if(youtubeReady){
      console.log("setting player");
      var iframeID = $(this).find('.active').find('iframe').attr("id");
      player = new YT.Player(iframeID); 
      player.stopVideo(); 
    }
  });
  </script>

</body>

</html>
