<?php
	include("conexao.php");
	$ataque = $_COOKIE['ataque'];
	$ataqueG = $_COOKIE['ataqueG'];
	$defesaG = $_COOKIE['defesaG'];
	$agilidadeG = $_COOKIE['agilidadeG'];
	$inteligenciaG = $_COOKIE['inteligenciaG'];
	$defesa = 0;
	$agilidade = 0;
	$inteligencia = 0;
	$gasto = $ataqueG + $defesaG + $agilidadeG + $inteligenciaG;
	
	$queryInsert= "SELECT * FROM `tbtempo` WHERE `codTempo` = 1";//sql
	$Inserir = $pdo->prepare($queryInsert);//insert
	$Inserir->execute();
	while($linha1 = $Inserir->fetch()){
	$penalidade = $linha1['penalidade'];
	}
	
	if($penalidade < 1){
	$queryInsert= "UPDATE `dbNgnl`.`tbtempo` SET `ataque` = ataque + '".$ataque."',  `defesa` = defesa + '".$defesa."', `agilidade` = agilidade + '".$agilidade."', `inteligencia` = inteligencia + '".$inteligencia."', `col` = col - '".$gasto."' WHERE `tbtempo`.`codTempo` = 1;";//sql
		$Inserir = $pdo->prepare($queryInsert);
			$Inserir->execute();
				$VerificarInsert = $Inserir->rowCount();
					if($VerificarInsert > 0){
						echo "<script>alert(".$ataqueG.");
						window.location='treinar.php';</script>";
					}
					else{
						
					}
	}
	else{
		echo "<script>alert('Acesso restrito!');
		window.location='index.php';</script>";
	}
		
?>