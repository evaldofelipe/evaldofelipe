<?php
#Informamos as datas e horários de início e fim no formato Y-m-d H:i:s e os convertemos para o formato timestamp
$dia_hora_atual = strtotime(date("H:i:s"));
$dia_hora_evento = strtotime(date("18:10:30"));

#Achamos a diferença entre as datas...
$diferenca = $dia_hora_evento - $dia_hora_atual;

#Fazemos a contagem...
$dias = intval($diferenca / 86400);
$marcador = $diferenca % 86400;
$hora = intval($marcador / 3600);
$marcador = $marcador % 3600;
$minuto = intval($marcador / 60);
$segundos = $marcador % 60;

#Montando a String

$resultado ="";

if ($hora>=0)
	$resultado .= "$hora:";
if ($minuto>=0)
	$resultado .= "$minuto:";
if ($segundos>=0)
	$resultado .= "$segundos";

if (($dias<=0) && ($hora<=0) && ($minuto<=0) && ($segundos<=0))
	$resultado = "<br>Fim do open D:";

#Exibimos o resultado
echo "<h1>$resultado</h1>";
?>
