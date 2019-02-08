<?php
	$codCliente= $_GET['codCliente'];
	echo "<script>
	var numTel = prompt('Digite o novo Telefone:','');
	window.location = 'cadastrarTelefone2.php?codCliente=".$codCliente."&numTel='+numTel;
	</script>";
?>