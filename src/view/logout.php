<?php

session_start();

session_unset();
$_SESSION["login"] = [];

setcookie("id",'', time()-3600);
setcookie("key",'', time()-3600);

session_destroy();

header("Location: ./../../login.php");

?>