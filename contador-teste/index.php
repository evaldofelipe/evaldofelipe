
<html> 
	<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/flipclock.css">
    <script src="js/flipclock.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">

	<title>Contador</title>

    <style type="text/css">
                body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url(bg.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;
            -webkit-background-size: 100% 100%, auto;
            background-size: 100% 100%, auto;
            text-align: center;
        }


        .iframe{
            border-color: transparent;
            background:none transparent;
            height: 100%;
            margin-top: -40px;
            width: 100%;
            z-index: 100;
            display: block;
            position: absolute;
        }

        .hue{
            z-index: 10;
            width: 100%;
            height: 100%;
            }       

        .oi{
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: black;
            color: #fff;
            font-family: 'Roboto', sans-serif;
           
            }
            
            .content{
                width: 900px;
                text-align: center;
            }
        .barrinha{
            
            width: 700px;
            margin-top: -80px;
            margin-left:20%;
        }

        #cf {
          position:relative;
          height:281px;
          width:450px;
          margin:0 auto;
        }

        #cf img {
          position:absolute;
          left:0;
          -webkit-transition: opacity 1s ease-in-out;
          -moz-transition: opacity 1s ease-in-out;
          -o-transition: opacity 1s ease-in-out;
          transition: opacity 1s ease-in-out;
        }

        #cf img.top:hover {
          opacity:0;
        }

        @keyframes cf3FadeInOut {
          0% {
          opacity:1;
        }
        45% {
        opacity:1;
        }
        55% {
        opacity:0;
        }
        100% {
        opacity:0;
        }
        }

        #cf3 img.top {
        animation-name: cf3FadeInOut;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-duration: s;
        animation-direction: alternate;
        }

    </style>

    
	</head>
	<body>

        <!-- <iframe class="iframe" src="http://evaldofelipe.com/contador1007/slider.php"></iframe> -->
        
        <div class="container">
            <div class="logo">
                <img src="img/logo.gif">
            </div>
            
            <div class="central">
                <img src="img/img1.gif">
            </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="barrinha">
                <div class="your-clock" style="margin-left:110px;">  
                </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" id="bar">
                        </div>
                    </div>
            </div>

            <div class="logo">
                <img src="img/logo2.png">
            </div>
        </div>

        <script type="text/javascript">

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function addWeek(w) {
        if (w < 6) {
            var d = new Date();
            var weekday = new Array(7);
            weekday[0]=  "domingo";
            weekday[1] = "segunda-feira";
            weekday[2] = "terça-feira";
            weekday[3] = "qarta-feira";
            weekday[4] = "quinta-feira";
            weekday[5] = "sexta-feira";
            weekday[6] = "sabado";
            
            var w = weekday[d.getDay()];
        }
        return w;
    }

    var d = new Date();
    var w = addWeek(d.getDay());
    var q = (d.getDay());
    var h = addZero(d.getHours());
    var m = addZero(d.getMinutes());
    var s = addZero(d.getSeconds());
    var oi = w + ", " + h + ":" + m + ":" + s; //string completa
    var oi2 = q + h  + m + s; // 4 + 22 + 30 + 00 = 56
    var oi3 = h + ":" + m + ":" + s; //string horario 
 
    console.log(q);
    console.log(h);
    console.log(m);

//--------------//

    if ( q == 0 ) {
        console.log("ta no dia!");
            if ((h >= 00) && (h <= 01)) { 
                console.log("ta na hora!")
                

                if ((m >= 01) && (m <= 59)) {
                    console.log("ta no minuto!")

                        var open = h * 60;
                        console.log(open);

                    $(document).ready(function() {
            var clock = $('.your-clock').FlipClock({
                autoStart: false,
                countdown: true
            });  

            if (h == 15 ) {
                var start = 7200 - (m * 60);
            }else {
                var start = 3600 - (m * 60);
            }

            clock.setTime(start);
            clock.start();

            var getTime = function () {
                setTimeout(function () {
                    console.log(clock.getTime());
                    var now = clock.getTime().time;
                    var percent = ((now / start * 100) - 100) * -1;
                    console.log(percent);

                    $('#bar').css({ 
                        width: percent + '%'
                    });

                    $('#bar').attr('aria-valuenow', percent);

                    if (percent < 100) {
                        getTime();
                    } else {
                        window.location.href = 'http://evaldofelipe.com/contador1007/after.html';
                    }
                }, 1000);
            };
            getTime();
         });

                } else {
                    console.log("ta quase no minuto!")
                   window.alert("Ta muito perto! faltam " + ( m - 30 )+ " Minutos :D");
                };
            } else {
                console.log("ta quase na hora!")
                 window.alert("Opa! hoje é sábado, dia de open. Ta quase na hora! são " + h + " e " + m + ". Falta pouco! :D");
            }
    } else {
        console.log("ainda nao e quarta")
        window.alert("Calma aí, ainda é " + w + " não tem openbar! ): ");
        // $('#myModal').modal({
        // keyboard: false
        // })

    }
    </script>
    <!-- contador -->		
	</body>
</html>
	
