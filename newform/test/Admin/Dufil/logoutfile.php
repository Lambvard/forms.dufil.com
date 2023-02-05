<?php
session_start();
unset($_SESSION['trackboy']);
session_destroy();

header("Location:../index.php");




?>