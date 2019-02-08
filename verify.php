<?php
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
	header('location: index.php');
}
else{

	?>
	<link href="style/popup.css" rel="stylesheet">
	<?php

	$user = $_SESSION['user'];
	$querySelect= "SELECT * FROM `tbUser` WHERE `user` = '$user'";//sql
	$select = $pdo->prepare($querySelect);//insert
	$select->execute();
	while($linha = $select->fetch()){
		$level = $linha['level'];
		$classe = $linha['classe'];
		$xp = $linha['xp'];
		$xpProx = $linha['xpProx'];
	}
	if($xp >= $xpProx){
		$queryInsert1= "UPDATE `dbBrowserRPG`.`tbUser` SET `hp` = hp + 50, `hpAtual` = hp, `level` = level + 1, `xpProx` = xpProx * 1.40 WHERE `tbUser`.`user` = '$user';";
		$Inserir1 = $pdo->prepare($queryInsert1);//insert
		$Inserir1->execute();
		?>
			<script>
				function initPage(){
					window.location="#popup1";
				}
				window.onload = initPage;
				</script>
			<div id="popup1" class="overlay">
				<div class="popup">
					<h2>Parabéns!</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						Você upou!!! Dê uma olhada nas suas novas habilidades clicando <a href="status.php">aqui.</a>
					</div>
				</div>
			</div>
		<?php
	}
	if ($level > 9 && $level < 50) {
		if ($classe == 'Pirata') {
			$classe = 'Rei dos Piratas';
			$queryInsert2= "UPDATE `dbBrowserRPG`.`tbUser` SET `classe` = '$classe', `alcunha` = 'Novato', `energia` = energia + 100, `ataque` = ataque + 100, `defesa` = defesa + 50, `inteligencia` = inteligencia + 10, `sabedoria` = sabedoria + 10, `agilidade` = agilidade + 10, `sorte` = sorte + 50, `velocidade` = velocidade + 10 WHERE `tbUser`.`user` = '$user';";
			$Inserir2 = $pdo->prepare($queryInsert2);//insert
			$Inserir2->execute();
			?>
			<script>
				function initPage(){
					window.location="#popup2";
				}
				window.onload = initPage;
				</script>
			<div id="popup2" class="overlay">
				<div class="popup">
					<h2>Parabéns!</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						Você subiu de classe!!! Dê uma olhada nas suas novas habilidades clicando <a href="status.php">aqui.</a>
					</div>
				</div>
			</div>
		<?php
		}
	}
}
?>