<?php

session_start();

session_unset();
$_SESSION["login"] = [];

session_destroy();

header("Location: ./../../login.php");

?>