<?php
session_start();
unset($_SESSION['sec_admin']);
unset($_SESSION['compcodeses']);
unset($_SESSION['complocses']);
session_destroy();
unset($_SESSION['currentsensoryid']);

header("Location:index.php");




?>