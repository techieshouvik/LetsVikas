<?php

session_start();
//connection details
$host="localhost";
$user="root";
$pass="";
$db="letsvikas";

//actual connection
$link=mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$sql = "DELETE from `posts` where `postId` = '".mysqli_real_escape_string($link,$_GET['id'])."';";
$link->query($sql);
header("Location: dashboard.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Post</title>
</head>
<body style="background-color: #169db2;">
</body>
</html>