<html>
<head>
<title>Seu t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td colspan="2"><div align="center"> 
        Cabe&ccedil;alho aqui </div></td>
  </tr>
  <tr> 
    <td width="22%" height="56" valign="top"> 
      Menu lateral aqui
    </td>
    <td valign="top"> <p align="center"> <?php
// Conexão com o BD
include "conecta_mysql.inc";
// Pegar a página atual por GET
$p = $_GET["p"];
// Verifica se a variável tá declarada, senão deixa na primeira página como padrão
if(isset($p))
{
	$p = $p;
}
else
{
	$p = 1;
}
// Defina aqui a quantidade máxima de registros por página.
$qnt = 10;
// O sistema calcula o início da seleção calculando: 
// (página atual * quantidade por página) - quantidade por página
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos números acima
$sql_select = "SELECT * FROM fotos where status='Sim' GROUP BY evento ORDER BY data desc LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);
echo'<br>';
// executar query
if ($sql_query==0)
{
	echo'<br>';
	echo'<p align="center"><font size="2" face="Verdana"><strong>GALERIA DE FOTOS VAZIA</strong></font></p>';
	exit;

}
else
{
	// bloco 5 - exiba os registros na tela
	echo'<p align="center"><font size="4" face="Verdana">GALERIA DE FOTOS</font></p>';
	echo'<form name="form1" method="get" action="galeria3.php" target="_parent">';
	echo'<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  	<tr> 
    <td width="15%" height="16" valign="middle" bgcolor="#4F7DB0"> 
    <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>DATA</strong></font></div></td>
	<td width="85%" height="16" valign="middle" bgcolor="#4F7DB0"> 
    <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>EVENTO</strong></font></div></td>
  	</tr>
	</table>';//Título da tabela//Título da tabela';;
	while (list($id,$evento,$comentario,$path,$data,$data_cad,$data_alt,$ip,$status) = mysql_fetch_array($sql_query))//Por ser uma lista, os sampos devem ser seguidos conforme a sequência no Banco de Dados. Caso não queira todos os campos, deixar espaços em branco
 		{
			//echo "<li> $titulo - $autor";
			//echo'<body text="#FFFFFF" link="#FFFFFF" vlink="#000066" alink="#FFFFFF">
			echo'<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1"><tr> 
    		<td width="15%" height="16" valign="middle" bgcolor="#D9E3EE"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="galeria3.php?data='.$data.'" target="_parent">'.date('d/m/Y',strtotime($data)).'</a></font></div></td>
    		<td width="85%" height="16" valign="middle" bgcolor="#D9E3EE"><div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="galeria3.php?data='.$data.'" target="_parent">'.$evento.'</a></font></div></td>
  			</tr>
			</table>';
 		}

 echo'</form>';
// Depois que selecionou todos os nome, pula uma linha para exibir os links(próxima, última...)
echo "<br />";
// Faz uma nova seleção no banco de dados, desta vez sem LIMIT, 
// para pegarmos o número total de registros
$sql_select_all = "SELECT * FROM fotos where status='Sim' GROUP BY evento ORDER BY data desc";
// Executa o query da seleção acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma variável com o número total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra variável, desta vez com o número de páginas que será precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// Número máximos de botões de paginação
$max_links = 3;
// Exibe o primeiro link 'primeira página', que não entra na contagem acima(3)
echo "<p align=\"center\"><font color=\"#000000\" size=\"2\" face=\"Arial, Helvetica, sans-serif\"><strong><a href='galeria.php?p=1' target='_self'>Primeira Página</a> ";
// Cria um for() para exibir os 3 links antes da página atual
for($i = $p-$max_links; $i <= $p-1; $i++)
{
	// Se o número da página for menor ou igual a zero, não faz nada
	// (afinal, não existe página 0, -1, -2..)
	if($i <=0)
	{
		//faz nada
		// Se estiver tudo OK, cria o link para outra página
	}
	else
	{
		echo "<a href='galeria.php?p=".$i."' target='_self'>".$i."</a> ";
	}
}
// Exibe a página atual, sem link, apenas o número
echo $p." ";
// Cria outro for(), desta vez para exibir 3 links após a página atual
for($i = $p+1; $i <= $p+$max_links; $i++)
{
	// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
	if($i > $pags)
	{
		//faz nada
	}
	// Se tiver tudo Ok gera os links.
	else
	{
		echo "<a href='galeria.php?p=".$i."' target='_self'>".$i."</a> ";
	}
}
// Exibe o link "última página"
echo "<a href='galeria.php?p=".$pags."' target='_self'>Última Página</a></strong></font></p> ";
}//Fim do else
?>
        </p></td>
  </tr>
  <tr> 
    <td height="18" colspan="2"> <div align="center"> 
        Rodap&eacute; aqui </div></td>
  </tr>
</table>
</body>
</html>
