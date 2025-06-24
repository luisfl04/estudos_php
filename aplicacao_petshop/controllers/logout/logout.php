<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: /estudos_php/aplicacao_petshop/index.php");
exit;
?>
