<?php

$host = "localhost";
$bd = "evaldofe_1007";
$user = "evaldofe_1007";
$senha = "1007159";

$conexao = mysql_pconnect($host, $user, $senha) or die(mysql_error());

mysql_select_db($bd, $conexao) or die(mysql_error());


?>