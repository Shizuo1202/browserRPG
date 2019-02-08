<?php 
include("conexao.php");
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
?>
<html>
	<head>
		<link href="style/index.css" rel="stylesheet">
		<link href="style/popup.css" rel="stylesheet">
		<script>
			function nick(){
				var display = document.getElementById(popupNick).style.display;
		        if(display == "none")
		            document.getElementById(popupNick).style.display = 'block';
		        else
		            document.getElementById(popupNick).style.display = 'none';
			}
		</script>
		<title>Browser RPG - Início</title>
	</head>
	<body>
		<div id="topoOff">
			<table class="indicadores">
			  <tr>
			  	<td rowspan="3" style="font-size: 50px; width: 60%;">BrowserRPG</td>
			    <td>Usuário:</td>
			    <td>Senha:</td>
			  </tr>
			  <tr>
			  	<form name="flogin" class="flogin" action="validaLogin.php" method="post">
			    <td><input type="text" name="fuser"></td>
			    <td><input type="password" name="fpass"></td>
			    <td><input type="submit" value="Entrar"><br></td>
				</form>
			  </tr>
			  <tr>
			  	<td><a href="esqueceuSenha.php" class="esqueceu">Esqueceu a conta?</a></td>
			  </tr>
			  </form>
			</table>
		</div>
		<div class="formCadastro">
			<<table class="cadastro">
			  <tr>
			  	<td rowspan="10" style="font-size: 50px; width: 20%;">BrowserRPG</td>
			  </tr>
			  <tr>
			  	<form name="fCadastro" class="fCadastro" action="cadastro.php" method="post">
			    <td>Nick: </td>
			    <td><input type="text" name="fuserC"></td>
			    <td><a href="#popupNick" onclick="nick()">?</td>
			</div>
			  </tr>
			  <tr>
			  	<td>Senha: </td>
			  	<td><input type="password" name="fpassC"></td>
			  	<td><a href="#popupSenha" onclick="senha()">?</td>
			  </tr>
			  <tr>
			  	<td>Repetir senha: </td>
			  	<td><input type="password" name="fpassRC"></td>
			  	<td><a href="#popupReSenha" onclick="senha()">?</td>
			  </tr>
			  <tr>
			  	<td>Email: </td>
			  	<td><input type="text" name="femailC"></td>
			  	<td><a href="#popupEmail" onclick="senha()">?</td>
			  </tr>
			  <tr>
			  	<td>Classe: </td>
			  	<td>
			  		<select name="fclasseC">
						<option name="fclasseC" value="volvo">Volvo</option>
						<option name="fclasseC" value="saab">Saab</option>
						<option name="fclasseC" value="mercedes">Mercedes</option>
						<option name="fclasseC" value="audi">Audi</option>
					</select>
				</td>
				<td>Esse será seu nick que você usará para logar no game e ser reconhecido por outros dentro do game. Seja criativo.</td>
			  </tr>
			  <tr>
			  	<td>Estilo: </td>
			  	<td>
			  		<select name="festiloC">
						<option name="festiloC" value="volvo">Volvo</option>
						<option name="festiloC" value="saab">Saab</option>
						<option name="festiloC" value="mercedes">Mercedes</option>
						<option name="festiloC" value="audi">Audi</option>
					</select>
					<td>Esse será seu nick que você usará para logar no game e ser reconhecido por outros dentro do game. Seja criativo.</td>
			  	</td>
			  </tr>
			  <tr>
			  	<td>Origem: </td>
			  	<td>
			  		<select name="forigemC">
						<option name="forigemC" value="volvo">Volvo</option>
						<option name="forigemC" value="saab">Saab</option>
						<option name="forigemC" value="mercedes">Mercedes</option>
						<option name="forigemC" value="audi">Audi</option>
					</select>
					<td>Esse será seu nick que você usará para logar no game e ser reconhecido por outros dentro do game. Seja criativo.</td>
			  </td>
			  <tr>
			  	<td>Mestre: </td>
			  	<td><input type="text" name="fmestreC"></td>
			  	<td>Esse será seu nick que você usará para logar no game e ser reconhecido por outros dentro do game. Seja criativo.</td>
			  </tr>
			  <tr>
			  	<td><input type="submit" value="Cadastrar!"><br></td>
			  </tr>
				</form>
			  </tr>
			  </form>
			</table>
		</div>
		<div id="popupNick" class="overlay">
			<div class="popup">
				<h2>Nick</h2>
				<a class="close" href="#">&times;</a>
				<div class="content">
				Esse será seu nick que você usará para logar no game e ser reconhecido por outros dentro do game. Seja criativo.
				</div>
			</div>
		</div>
		<div id="popupSenha" class="overlay">
			<div class="popup">
				<h2>Senha</h2>
				<a class="close" href="#">&times;</a>
				<div class="content">
				Essa será a senha que você irá usar para logar no game, não esqueça ela!
				</div>
			</div>
		</div>
		<div id="popupReSenha" class="overlay">
			<div class="popup">
				<h2>Repetir senha</h2>
				<a class="close" href="#">&times;</a>
				<div class="content">
				Repita a senha que você digitou.
				</div>
			</div>
		</div>
		<div id="popupEmail" class="overlay">
			<div class="popup">
				<h2>Email</h2>
				<a class="close" href="#">&times;</a>
				<div class="content">
				Coloque um email válido! Pois você precisará dele caso esqueça sua senha.
				</div>
			</div>
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
		<div id="topoOn">
			<table class="indicadores" style="width: 100%;">
			  <tr>
			  	<td rowspan="5" style="font-size: 50px;">BrowserRPG</td>
			  	<td rowspan="5"><img src="img/users/luiisimg.jpg" width="100px" height="100px" /></td>
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
			  	<td>Moedas: <?php echo number_format($moeda, 2, ',', '.'); ?></td>
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
				<tr>
					<td><a href="treino.php">Treino</a></td>
				</tr>
			</table>
		</div>
	</body>
</html>
		
<?php	} ?>