<?php
	//dados do user
	include("conexao.php");
	if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
		header('location: index.php');
	}
	else{
		$user = $_SESSION['user'];
		include("verify.php");
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
			$fimPena = $linha['fimPena'];
		}
		date_default_timezone_set('America/Sao_Paulo');
		$data1 = date('d/m/Y');
		$data1 = date('H:i:s');
		if ($fimPena != NULL) {
			$data2 = date('d-m-Y H:i:s', strtotime("+0 minutes",strtotime($fimPena)));
			$unix_data1 = strtotime($data1);
			$unix_data2 = strtotime($data2);

			$nHoras   = ($unix_data2 - $unix_data1) / 3600;
			$nMinutos = (($unix_data2 - $unix_data1) % 3600) / 60;
			$nSegundos = (($unix_data2 - $unix_data1) % 3600) % 60;
			$minu = floor($nHoras) * 60;
			$seg = ($minu + (floor($nMinutos) * 60) + $nSegundos) - 1;

			?>
			<script>
			function formatatempo(segs) {
			//function por Augusto Claro
			//augustoclaro1@hotmail.com
			//www.seven3d.com.br
			min = 0;
			hr = 0;
			/*
			if hr < 10 then hr = "0"&hr
			if min < 10 then min = "0"&min
			if segs < 10 then segs = "0"&segs
			*/
			while(segs>=60) {
			if (segs >=60) {
			segs = segs-60;
			min = min+1;
			}
			}

			while(min>=60) {
			if (min >=60) {
			min = min-60;
			hr = hr+1;
			}
			}

			if (hr < 10) {hr = "0"+hr}
			if (min < 10) {min = "0"+min}
			if (segs < 10) {segs = "0"+segs}
			fin = hr+":"+min+":"+segs
			return fin;
			}
			var segundos = <?php echo $seg; ?>; //inicio do cronometro
			function conta() {
			segundos--;
			document.getElementById("counter").innerHTML = formatatempo(segundos);
			if(segundos <= 0){
				<?php setcookie('var', '2'); ?>
				document.getElementById("counter").innerHTML = "<p>A Caçada terminou, clique <a href='iniciar.php'>aqui</a> para receber sua recompensa.</p>";
			}
			}

			function inicia(){
			interval = setInterval("conta();",1000);
			}
			window.onload = function(){
			inicia();
			}
			</script>
			<?php
			echo "<span id='counter'>";
			printf('%02d:%02d:%02d', $nHoras, $nMinutos, $nSegundos);
			echo "</span><br>";
		}
		else{
			if (($_COOKIE['xp']) == 0 || empty($_COOKIE['xp'])) {
				echo '	<script>
						function inicia(){
							document.cookie="var= 1";
							window.location="iniciar.php";
						}
						function treinar(){
							window.location="treinar.php";
						}
					</script>';
				echo  '<input type="button" value="Caçar" onclick="inicia()">';
				echo  '<input type="button" value="Treinar" onclick="treinar()">';
			}
			else{
				echo "Você ganhou ".$_COOKIE['xp']." de xp e ".$_COOKIE['col']." col's. Clique <a href='cacatime.php'>aqui</a> para atualizar.";
				setcookie('xp', '0');
				setcookie('col', '0');
			}
		}
	}
?>