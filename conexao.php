<?php
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=dbbrowserRPG","root", "");
	}catch(PDOException $erroJapa){
		echo "OPS!!! Um pequeno erro: ".$erroJapa->getMessage();
	}

?>