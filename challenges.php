<?php
	include("lib/php/CONECTAR_DB.php");
	include("lib/php/RETOS.php");
	include("lib/php/PERFIL.php");
	session_start();
	if(!isset($_SESSION["id"])) {
		echo "No session id";
	} else {
	
		$id = $_SESSION["id"];
		
		
		$game_id = getGameIdFromUserId($connect, $id);
		if($game_id !== null) {
			$challenger_id = getChallengerIdByGameId($connect, $game_id, $id);
			
			
			$challenger_profile = getProfile($connect, $challenger_id);
			
			echo "<div>$challenger_profile[1] LO HA RETADO : <a href=GAME.php?mode=1&challenger_id=$challenger_profile[0]&game_id=$game_id>ACEPTAR</a><br/><a href=javascript:rejectChallenge()>NO</a></div>";
		}
	
	}
?>