<?php

$to=$_POST['to'];
$copy=$_POST['copy'];
$subject=$_POST['subject'];
$body=$_POST['body'];


$res=mail($to,$subject,$body);

echo '<script>alert("Email sent successfully")</script>';












?>