<html>
	<head>
		<title>JUEGANDO ...</title>
		<script type="text/javascript" src="lib/js/maingame.js"></script>
		<script type="text/javascript" src="lib/js/game.js"></script>
		<script type="text/javascript" src="lib/js/cancelar.js"></script>
		<script type="text/javascript">
			window.addEventListener("unload", cancelGame);
			function buttonClicked(e) {
				var b = e.target;
				var id = b.id;
				var tile = id.substr(1,1);
				
				playGame(tile);
			}
			
			window.onload = reload;
			
			function reload() {
				reloadBoard();
				reloadControl();
				setTimeout(reload, 1000);
			}
		</script>
		
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
		
	</head>
	
	<body> TIC TAC TOE
		<?php
			include("lib/php/CONECTAR_DB.php");
			include("lib/php/PERFIL.php");
			
			
			session_start();
			if($_GET["mode"] == 0) {
				include("lib/php/CREAR_JUEGO.php");
				
				$player1_id = $_SESSION["id"];
				
				if(isset($_GET["challenged_id"])){
					$player2_id = $_GET["challenged_id"];
				
				
				
					$game_id = makeGame($connect, $player1_id, $player2_id);
				
					$_SESSION["game_id"] = $game_id;
				}
				
				else {
					echo "Error. Please Login.";
				}
				
			}
			else if($_GET["mode"] == 1) {
				$game_id = $_GET["game_id"];
				
				$player1_id = $_GET["challenger_id"];
				$player2_id = $_SESSION["id"];
				
				$_SESSION["game_id"] = $game_id;
				
			}
			
			$player1_profile = getProfile($connect, $player1_id);
			$player2_profile = getProfile($connect, $player2_id);
		?>
			
		<div id="main">
			<div id="player_1"><?php 
				echo "JUGADOR RETADO (".$player2_profile[1].") : O";
				?>
			</div><br/>
			<div id="game">
				<div id="board">
					<form name="game">
						<input type="button" id="b1" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   
						<input type="button" id="b2" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   
						<input type="button" id="b3" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   <br/>
						<input type="button" id="b4" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   
						<input type="button" id="b5" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   
						<input type="button" id="b6" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   <br/>
						<input type="button" id="b7" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   
						<input type="button" id="b8" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   
						<input type="button" id="b9" class="buttonplay" onclick="buttonClicked(event)" value="   "/>   <br/>
					</form>
				</div>
			</div><br/>
			<div id="player_2"><?php
				echo "INICIA RETADOR (".$player1_profile[1].") : X";
				?>
			</div>
                        <div id="Abandonar">
                            <a href="Triqui.php">Abandonar</a>
				
			</div>
			<div id="controller">
				<div id="control"></div>
				<div id="control_text"></div>
			</div>
		</div>
	</body>
</html>
