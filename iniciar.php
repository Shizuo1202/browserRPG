<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
	header('location: index.php');
	}
	else{
	$user = $_SESSION['user'];
	date_default_timezone_set('America/Sao_Paulo');
	$data1 = date('Y/m/d');
	$data1 = date('H:i:s');
	include("conexao.php");
	$codCliente= $_COOKIE['var'];
	?>
	<script>
	function pegaCookie(i){
    var n = i + "=";
    var k = document.cookie.split(';');
    for(var i=0; i<k.length; i++){
        var c = k[i];
        while(c.charAt(0) == " "){ c = c.substr(1); }
        if(c.indexOf(n) == 0){ return c.substr(n.length, c.length); }
    }
    return "";
}
</script>
	<?php
	if($codCliente == 1){
	$queryInsert= "UPDATE `dbBrowserRPG`.`tbUser` SET `penalidade` = '1', `fimPena` = '".date('Y/m/d H:i:s', strtotime("+1 hour",strtotime($data1)))."' WHERE `tbUser`.`user` = '$user';";//sql
		$Inserir = $pdo->prepare($queryInsert);
			$Inserir->execute();
				$VerificarInsert = $Inserir->rowCount();
					if($VerificarInsert > 0){
						setcookie('var');
						echo "<script>
						window.location='cacatime.php';</script>";
					}
					else{
						echo "<script>alert('Erro no Cadastro');
						window.location='cacatime.php';</script>";
					}
	}
	else if($codCliente == 2){
		$xpGanhada = rand(1, 10);
		$colGanhado2 = rand(0, 999);
		$colGanhado = $xpGanhada.$colGanhado2;
		$colGanhado = number_format($colGanhado, 2, ',', '.');
			$queryInsert= "UPDATE `dbBrowserRPG`.`tbUser` SET `penalidade` = '0', `moeda` = moeda + '".$xpGanhada.$colGanhado2."',`fimPena` = NULL, `xp` = xp + '".$xpGanhada."' WHERE `tbUser`.`user` = '$user';";//sql
			$Inserir = $pdo->prepare($queryInsert);
			$Inserir->execute();
				$VerificarInsert = $Inserir->rowCount();
					if($VerificarInsert > 0){
						setcookie('var');
						setcookie('xp', $xpGanhada);
						setcookie('col', $colGanhado);
						echo "<script>window.location='cacatime.php';</script>";
					}
					else{
						echo "<script>alert('Erro no Cadastro2');
						window.location='cacatime.php';</script>";
					}
	}
	else{
		echo "<script>alert('Acesso restrito!');
		window.location='index.php';</script>";
	}
	}	
?>