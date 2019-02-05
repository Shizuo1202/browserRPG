<?php
	include("conexao.php");
	$user= $_POST['fuser'];
	$pass= $_POST['fpass'];
		$logar2 = $pdo->prepare("SELECT user, pass FROM tbUser WHERE user = :user AND pass = :pass");
		$logar2->bindValue(':user',$user);
		$logar2->bindValue(':pass',$pass);
		$logar2->execute();
		$verificar = $logar2->rowCount();
		if($verificar > 0)
		{
			session_start();
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			echo "<script>window.location='index.php';</script>";
		} 
		else
		{
			unset ($_SESSION['user']);
  			unset ($_SESSION['pass']);
			echo "<script>
					alert('Dados inválidos');
				 	window.location='index.php';
				 </script>";
		}
?>