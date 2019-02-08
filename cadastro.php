<?php
	include ("conexao.php");
	if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
		header('location: index.php');
	}
	$user= $_POST['fuserC'];
	$pass= $_POST['fpassC'];
	$Rsenha= $_POST['fpassRC'];
	$email= $_POST['femailC'];
	$classe= $_POST['fclasseC'];
	$estilo= $_POST['festiloC'];
	$origem= $_POST['forigemC'];
	$mestre= $_POST['fmestreC'];

	if($user == "" || $pass == "" || $Rsenha == "" || $email == ""){
		echo "<script>alert('Preencha todos os campos!!!');
			window.location='index.php';</script>";
	}
	else{
		if($pass != $Rsenha){
			echo "<script>alert('Senhas Não Correspondem!!!!');
			window.location='index.php';</script>";
		}
		else{
			$queryInsert= "INSERT INTO tbUser(user, pass, email, classe, estilo, origem, mestre)
			VALUES ('$user', '$pass', '$email', '$classe', '$estilo', '$origem', '$mestre')";
			$Inserir = $pdo->prepare($queryInsert);//insert
			$Inserir->execute();
			$VerificarInsert = $Inserir->rowCount();
			if($VerificarInsert > 0){//retorno
							session_start();
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
				echo "<script>alert('Ok');
							window.location='index.php';</script>";
			}
			else{
				echo "<script>alert('$mestre');
					window.location='index.php';</script>";
			}
		}
	}

	
	
?>