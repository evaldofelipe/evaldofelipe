<?php

$host = "localhost";
$bd = "1007";
$user = "root";
$senha = "";

$conexao = mysql_pconnect($host, $user, $senha) or die(mysql_error());

mysql_select_db($bd, $conexao) or die(mysql_error());


?>