<?php

session_start();
unset($_SESSION['locationtracker']);

session_destroy();

header('location:../index.php');

?>