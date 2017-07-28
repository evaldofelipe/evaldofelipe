<?php

include ("conexao/conexao.php");


if (isset($_GET['approved'] || isset($_GET['id']))
{

	$approved = $_GET['approved'];
	$id = $_GET['id'];


	$query = "UPDATE testmonials set approved = '$approved' where id = $id";

	mysql_query($query);

echo "
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL= http://jurereconcierge.com/admin/_testmonials.php?result=approved'>";
	}
}


header('Location: testmonials.php');