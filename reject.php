<?php
	include("lib/php/CONECTAR_DB.php");
	include("lib/php/RECHAZAR.php");
	include("lib/php/RETOS.php");
	
	session_start();
	$id = $_SESSION["id"];
	$mode = $_GET["mode"];
	
	if($mode == 1) {
		$game_id = getGameIdFromUserId($connect, $id);
	
		$challenger_id = getChallengerIdByGameId($connect, $game_id);
	
		rejectGame($connect, $game_id, $id, $challenger_id);
		echo "No acepto el Juego.";
	}
	
	else {
		echo "Juego Cancelado  <a href='Triqui.php'>Profile</a> Volver a Inicio";
	}
?>