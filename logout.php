<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

require_once ("route.php");
redirect("login.php");
exit();
?>