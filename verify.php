<?php
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
	header('location: index.php');
}
else{

	?>
	<!-- ideally at the bottom of the page -->
	<!-- also works in the <head> -->
	<script src="alertify.js-0.3.11/lib/alertify.min.js"></script>
	<!-- include the core styles -->
	<!--<link rel="stylesheet" href="PATH_TO_FILE/alertify.css" /> -->
	<!-- include a theme, can be included into the core instead of 2 separate files -->
	<link rel="stylesheet" href="style/verify.css" />
	<?php

	$user = $_SESSION['user'];
	if($xp >= $xpProx){
		$queryInsert1= "UPDATE `dbBrowserRPG`.`tbUser` SET `level` = level + 1, `xpProx` = xpProx * 1.40 WHERE `tbUser`.`user` = '$user';";
		$Inserir1 = $pdo->prepare($queryInsert1);//insert
		$Inserir1->execute();
		echo '<div class="notify">Parabéns, você upou!!!</div>';
		echo '<div class="notify">Opa, Você está sendo atacado!!!</div>';
	}
}
?>