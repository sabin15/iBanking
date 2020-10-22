<?php
session_start();
session_destroy();
unset($_SESSION["username"]);
header("Location:http://127.0.0.1/ibanking/login.php");
?>
