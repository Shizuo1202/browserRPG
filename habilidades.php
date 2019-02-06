<?php 
include("conexao.php");
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
	header('location: index.php');
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
		$penalidade = $linha['penalidade'];
	}
?>
<html>
	<head>
		<link href="style/index.css" rel="stylesheet">
		<link href="style/cacatime.css" rel="stylesheet">
		<title>Browser RPG - Início</title>
	</head>
	<body>
		<div id="topoOn">
			<table class="indicadores" style="width: 100%;">
			  <tr>
			  	<td rowspan="5" style="font-size: 50px;">BrowserRPG</td>
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
		<div id="menu">
			<table class="menu">
				<tr>
					<th style="font-size: 30px; padding-bottom: 10%; padding-top: 5%;">Menu</th>
				</tr>
				<tr>
					<td><a href="status.php">Status</a></td>
				</tr>
				<tr>
					<td><a href="cacatime.php">Caçadas por tempo</a></td>
				</tr>
			</table>
		</div>
		<div id="pageCacaTime">
			<?php include("treinar.php"); ?>
		</div>
	</body>
</html>
		
<?php	} ?>