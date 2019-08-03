<?php 
$pid = $_GET["pid"];
exec("sudo -u root kill " + $pid);
?>
