<?php 
$pid = $_GET["pid"];
system("kill " + $pid);
?>