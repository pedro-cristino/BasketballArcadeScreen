<?php 
$pid = $_GET["pid"];
shell_exec("kill " + $pid);
?>