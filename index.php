

<?php
session_start();

if(isset($_SESSION["email"]))
header("refresh: 0.0; url=dashboard.php");

$cont=file_get_contents('index.html');
echo $cont;


?>