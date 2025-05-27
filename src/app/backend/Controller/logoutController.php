<?php

session_start();
session_destroy();
header("Location: ../../public/frontend/View/login.php");
exit();

?>