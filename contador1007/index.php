
<html> 
	<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/flipclock.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/flipclock.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">

	<title>Contador</title>

    
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

    if ( q == 6 ) {
        console.log("ta no dia!");
            if ((h >= 23) && (h <= 00)) { 
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

            if (h == 23 ) {
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
	
