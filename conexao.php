<?php
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=id8667501_dbbrowserrpg","roid8667501_shizuo1202ot", "35375823");
	}catch(PDOException $erroJapa){
		echo "OPS!!! Um pequeno erro: ".$erroJapa->getMessage();
	}

?>