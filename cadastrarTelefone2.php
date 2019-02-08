<?php
	include("../conexao.php");
	$codCliente = $_GET['codCliente'];
	$numTel = $_GET['numTel'];
	$queryInsert= "INSERT INTO tbTelefoneCliente(numTelefoneCliente, codCliente, status) VALUES ('$numTel', '$codCliente', 1)";//sql
	$Inserir = $pdo->prepare($queryInsert);//insert
	$Inserir->execute();
	$VerificarInsert = $Inserir->rowCount();
	if($VerificarInsert > 0){//retorno
		echo "<script>alert('Telefone Cadastrado Com Sucesso');
					window.location='../dados.php';</script>";
	}
	else{
		echo "<script>alert('Erro no Cadastro');
					window.location='../dados.php';</script>";
	}
?>