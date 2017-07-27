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
    <td width="22%" height="37" valign="top"> 
      Menu lateral aqui </td>
    <td valign="top"> <p align="center"> <?php
// Conexão com o BD
include "conecta_mysql.inc";
// Pegar a página atual por GET
$p = $_GET["p"];
$datas = $_GET["data"];
// Verifica se a variável tá declarada, senão deixa na primeira página como padrão
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade máxima de registros por página.
$qnt = 1;
// O sistema calcula o início da seleção calculando: 
// (página atual * quantidade por página) - quantidade por página
$inicio = ($p*$qnt) - $qnt;
// consulta apenas os registros da p&aacute;gina em quest&atilde;o utilizando como aux&iacute;lio a defini&ccedil;&atilde;o LIMIT. Ordene os registros pela quantidade de pontos, come&ccedil;ando do maior para o menor DESC.
$consulta = "SELECT * FROM fotos where data='$datas' and status='Sim' order by id LIMIT $inicio, $qnt";
// executar query
// bloco 5 - exiba os registros na tela
//echo "<ul>";
$query = mysql_query($consulta);
while (list($id,$evento,$comentario,$path,$data,$data_cad,$data_alt,$ip,$status) = mysql_fetch_array($query))//Por ser uma lista, os sampos devem ser seguidos conforme a sequência no Banco de Dados. Caso não queira todos os campos, deixar espaços em branco
{
echo'<br>';
echo'<p align="center"><font size="4" face="Verdana">'.$evento.'</font></font></p>';
  echo'<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF"><tr>
    <td height="2"><div align="center"><img src="'.$path.'" width="450" height="350" border="10"></div></td>
  </tr>
  <tr>
    <td height="2"><div align="center" class="style1 style2">'.$comentario.'</div></td>
  </tr>';
}
echo'</table>';

// Depois que selecionou todos os nome, pula uma linha para exibir os links(próxima, última...)
echo "<br />";

// Faz uma nova seleção no banco de dados, desta vez sem LIMIT, 
// para pegarmos o número total de registros
$sql_select_all = "SELECT * FROM fotos where data='$datas' and status='Sim' order by id";
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
echo "<p align=\"center\"><font color=\"#000000\" size=\"2\" face=\"Arial, Helvetica, sans-serif\"><strong><a href='galeria3.php?p=1&data=".$datas."' target='_self'>Primeira Página</a> ";
// Cria um for() para exibir os 3 links antes da página atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o número da página for menor ou igual a zero, não faz nada
// (afinal, não existe página 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra página
} else {
echo "<a href='galeria3.php?p=".$i."&data=".$datas."' target='_self'>".$i."</a> ";
}
}
// Exibe a página atual, sem link, apenas o número
echo $p." ";
// Cria outro for(), desta vez para exibir 3 links após a página atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{
echo "<a href='galeria3.php?p=".$i."&data=".$datas."' target='_self'>".$i."</a> ";
}
}
// Exibe o link "última página"
echo "<a href='galeria3.php?p=".$pags."&data=".$datas."' target='_self'>Última Página</a></strong></font></p> ";
?> 
</p>
      <div align="center"></div>
      <div align="center"></div>
      <div align="center"></div>    </td>
  </tr>
  <tr> 
    <td height="18" colspan="2"> <div align="center"> 
        Rodap&eacute; aqui </div></td>
  </tr>
</table>
</body>
</html>