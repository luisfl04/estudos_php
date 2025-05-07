<?php
// Incluindo classe da conta corrente:
include("conta_corrente.php");

// Instancia:
$minha_conta_corrente = new ContaCorrente("Pedro Henrique", 2082.6, 16442.9, 100.00);
// Printando infos:
echo $minha_conta_corrente->getExtratoContaCorrente();
?>
