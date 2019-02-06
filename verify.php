<?php
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
	header('location: index.php');
}
else{

	?>
	<link rel="stylesheet" href="style/verify.css" />
	<link href="style/popup.css" rel="stylesheet">
	<?php

	$user = $_SESSION['user'];
	if($xp >= $xpProx){
		$queryInsert1= "UPDATE `dbBrowserRPG`.`tbUser` SET `level` = level + 1, `xpProx` = xpProx * 1.40 WHERE `tbUser`.`user` = '$user';";
		$Inserir1 = $pdo->prepare($queryInsert1);//insert
		$Inserir1->execute();
		?>
					<h1>Popup/Modal Windows without JavaScript</h1>
			<div class="box">
				<script>
				function initPage(){
					window.location="#popup1";
				}
				window.onload = initPage;
				</script>
			</div>

			<div id="popup1" class="overlay">
				<div class="popup">
					<h2>Parabéns!</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						Você upou!!! Dê uma olhada nas suas novas habilidades clicando <a href="status.php">aqui.</a>>
					</div>
				</div>
			</div>
		<?php
	}
}
?>