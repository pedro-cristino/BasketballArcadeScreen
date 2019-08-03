<?php 
$pid = $_GET["pid"];
exec("kill " + $pid);
?>
