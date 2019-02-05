<?php 
include("conexao.php");
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
?>
<html>
	<head>
		<link href="style/index.css" rel="stylesheet">
		<title>Browser RPG - Início</title>
	</head>
	<body>
		<div id="game">
			<table class="indicadores">
			  <tr>
			  	<td style="padding-left: 30%; font-size: 25px">BrowserRPG</td>
			    <td style="padding-left: 165%;">Usuário:</td>
			    <td style="padding-left: 220%;">Senha:</td>
			  </tr>
			</table>
			<form name="flogin" class="flogin" action="validaLogin.php" method="post">
			  <input type="text" name="fuser" style="margin-right: 3%; margin-bottom: 1%;">
			  <input type="password" name="fpass" style="margin-right: 3%;">
			  <input type="submit" value="Entrar" style="margin-right: 3%;"><br>
			  <a href="esqueceuSenha.php" class="esqueceu">Esqueceu a conta?</a>
			</form>
		</div>
	</body>
</html>
<?php
	}
	else{
	$user = $_SESSION['user'];
	$querySelect= "SELECT * FROM `tbUser` WHERE `user` = '$user'";//sql
	$select = $pdo->prepare($querySelect);//insert
	$select->execute();
	while($linha = $select->fetch()){
		$xp = $linha['xp'];
		$xpProx = $linha['xpProx'];
		$hp = $linha['hp'];
		$hpAtual = $linha['hpAtual'];
		$alcunha = $linha['alcunha'];
		$energia = $linha['energia'];
		$level = $linha['level'];
		$magia = $linha['magia'];
		$classe = $linha['classe'];
		$moeda = $linha['moeda'];
	}
?>
<html>
	<head>
		<link href="style/index.css" rel="stylesheet">
		<title>Browser RPG - Início</title>
	</head>
	<body>
		<div id="game">
			<table class="indicadores" style="width:100%; border: 1px solid black;">
			  <tr>
			  	<td rowspan="5">BrowserRPG</td>
			  	<td rowspan="5">img</td>
			    <td>User: <?php $userM = ucfirst($user); echo $userM; ?></td>
			    <td>XP: <?php echo $xp; ?>/<?php echo $xpProx; ?></td>
			  </tr>
			  <tr>
			  	<td>Alcunha: <?php echo $alcunha; ?></td>
			  	<td>HP: <?php echo $hp; ?>/<?php echo $hpAtual; ?></td>
			  </tr>
			  <tr>
			  	<td>Level: <?php echo $level; ?></td>
			  	<td>Energia: <?php echo $energia; ?></td>
			  </tr>
			  <tr>
			  	<td>Classe: <?php echo $classe; ?></td>
			  	<td>Magia: <?php echo $magia; ?></td>
			  </tr>
			  <tr>
			  	<td>Moedas: <?php echo $moeda; ?></td>
			  	<td><?php echo '<a href="logout.php">Logout</a>'; ?></td>
			  </tr>
			</table>
		</div>
	</body>
</html>
		
<?php	} ?>