<?php
	include("lib/php/CONECTAR_DB.php");
	include("lib/php/JUGAR.php");
	include("lib/php/CREAR_JUEGO.php");
	
	session_start();
	$game_id = $_SESSION["game_id"];
	
	$id = $_SESSION["id"];
	
	$tile = $_GET["tile"];
	
	$player = getPlayer($connect, $game_id, $id);
	
	$turn = getTurn($connect, $game_id);
	
	$completeData = getTileData($connect, $game_id);
	
	$id1 = $completeData["player1_id"];
	$id2 = $completeData["player2_id"];
	
	
	
		if($turn == $player) {
		
			if(setTileData($connect, $player, $tile, $game_id)) {
			
				
						
				if(!gameWin($connect, $game_id, $player)){
					
					if(!checkDraw($connect, $game_id)) {
							
						setTurn($connect, $game_id);
							
						$turn = getTurn($connect, $game_id);
							
						echo "player". $turn . "turn.";
					}
						
					else {
					
						setResult($connect, $game_id, -1);
						destroyGame($connect, $id1, $id2);
						
						setResult($connect, $game_id, $player);
						increScore($connect, $id);
						destroyGame($connect, $id1, $id2);	
						
					}
				}
				else {
						
					setResult($connect, $game_id, $player);
					increScore($connect, $id);
					destroyGame($connect, $id1, $id2);	
				}
			}
		
		else {
		
		echo "Seleccionar []";
		}
		
	}	
	else {
			
		echo "No es su Turno";
	}
	
	
?>	