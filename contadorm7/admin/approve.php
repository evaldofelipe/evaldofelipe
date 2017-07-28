<?php



$approved = $_GET['approved'];


$query = "UPDATE testmonials set approved = '$approved' where id = $id";

mysql_query($query);

header('Location: testmonials.php');