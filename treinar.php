<?php 
// Conexão com o banco de dados 

date_default_timezone_set('America/Sao_Paulo');
$data1 = date('d/m/Y');
$data1 = date('H:i:s');
include("conexao.php");
	$queryInsert= "SELECT * FROM `tbtempo` WHERE `codTempo` = 1";//sql
	$Inserir = $pdo->prepare($queryInsert);//insert
	$Inserir->execute();
	$dataPena;
	$xp;
	$prox;
	$level;
	$nick;
	$ataque;
	$defesa;
	$agilidade;
	$sorte;
	$critico;
	$experiencia;
	$col;
	$colRest = 0;
	$col1 = 0;
	
	while($linha1 = $Inserir->fetch()){
	$dataPena = $linha1['fimPena'];
	$xp = $linha1['xp'];
	$prox = $linha1['xpProxLevel'];
	$level = $linha1['level'];
	$penalidade = $linha1['penalidade'];
	$nick = $linha1['nick'];
	$ataque = $linha1['ataque'];
	$defesa = $linha1['defesa'];
	$agilidade = $linha1['agilidade'];
	$critico = $linha1['critico'];
	$inteligencia = $linha1['inteligencia'];
	$col1 = $linha1['col'];
	$col = $linha1['col'];
	$col = number_format($col, 2, ',', '.');
	$sorte = $linha1['sorte'];
	$ataqueProx = $linha1['ataqueProx'];
	$defesaProx = $linha1['defesaProx'];
	$agilidadeProx= $linha1['agilidadeProx'];
	$inteligenciaProx = $linha1['inteligenciaProx'];
	}
	$ataqueG = ($ataque * 200) * 1.60;
	//VerificarInsert = $Inserir->rowCount();
	if($penalidade > 0){//retorn
		echo '<script>window.location="index.php";</script>';
	}
else {
 
 ?>
	<script type="text/javascript">
	var coltotal = <?php echo $ataque;?>;
	var ataque = <?php echo $ataque;?>;
	var ataqueAumentado = 0;
	var colRest = <?php echo $colRest; ?>;
	var col1 = <?php echo $col1; ?>;
	var colRest = <?php echo $col1; ?>;
	
    function atk()
    {
		ataqueG = (ataque * 200) * 1.60;
		if((colRest - ataqueG) > 0){
		colRest = col1 - ataqueG;
		ataque++;
		ataqueAumentado++;
        document.getElementById("atk1").innerHTML = '<p id="atk1" class="status">Ataque: ' + ataque + ' <button id="atk" onclick="atk();">Ok</button>'+ ataqueAumentado + ' , ' +ataqueG+'</p>';
		document.getElementById("rest").innerHTML = '<p id="rest" class="status">Cols restantes: ' + colRest + '</p>';
		if(ataqueAumentado + ataque){
		document.cookie='ataque=' + ataqueAumentado;
		document.cookie='ataqueG=' + ataqueG;
		}
		}
		else{
			document.getElementById("atk1").innerHTML = '<p id="atk1" class="status">Ataque: ' + ataque +' e aumentou '+ ataqueAumentado +'<button disabled id="atk" onclick="atk();">Ok</button>'+ ataqueG+'</p>';
		}
	
		if(colRest > 0){
			document.getElementById("treino").innerHTML = '<p id="treino"><input type="button" value="Treinar" onclick="treinar()"></p>';
		}
		else{
			document.getElementById("treino").innerHTML = '<p id="treino">Cols insuficientes.</p>';
		}
}
		
		function treinar(){
			window.location="sucesso.php";
		}
	</script>
  <body>
  <?php if($xp >= $prox){
		$queryInsert1= "UPDATE `dbNgnl`.`tbtempo` SET `level` = level + 1, `xpProxLevel` = xpProxLevel * 1.40 WHERE `tbtempo`.`codTempo` = 1;";//sql
		$Inserir1 = $pdo->prepare($queryInsert1);//insert
		$Inserir1->execute();
		echo "up";
	}?>
	<p class="status">Cols: <?php echo $col;?></p>
	<p id="rest" class="status">Cols restantes: <?php echo $col;?></p>
	</br>
	<p id="atk1" class="status">Ataque: <?php echo $ataque;?> <button id="atk" onclick="atk();">Ok</button><?php echo $ataqueG; ?></p>
	</br>
	<p class="status">Defesa: <?php echo $defesa;?> <input type="submit"></p>
	</br>
	<p class="status">Agilidade: <?php echo $agilidade;?> <input type="submit"></p>
	</br>
	<p class="status">Inteligência: <?php echo $inteligencia;?> <input type="submit"></p>
	</br>
	<p class="status">Sorte: <?php echo $sorte;?> <a href="">+</a></p>
	<p class="status">Crítico: <?php echo $critico;?> <a href="">+</a></p>
 <?php
	
	if (($_COOKIE['xp']) == 0) {
		if($col1 > $colRest){
			echo '<p id="treino"><input type="button" value="Treinar" onclick="treinar()"></p>';
			echo '<a href="index.php">Voltar</a>';
		}
		else{
			echo '<p id="treino">Cols insuficientes.</p>';
			echo '<a href="index.php">Voltar</a>';
		}
	}
	else{
		echo "Você ganhou ".$_COOKIE['xp']." de xp e ".$_COOKIE['col']." col's. Clique <a href='index.php'>aqui</a> para atualizar.";
		setcookie('xp', '0');
		setcookie('col', '0');
	} 
	?>
 </body>
 
 <?php
	}
?>