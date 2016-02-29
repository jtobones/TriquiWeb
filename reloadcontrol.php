<?php
	
	include("lib/php/CONECTAR_DB.php");
	include("lib/php/JUGAR.php");
        include("lib/php/PERFIL.php");
        include("lib/php/RETOS.php");
        include("lib/php/CREAR_JUEGO.php");
	
	
	session_start();
	$game_id = $_SESSION["game_id"];
        //$player1_id = $_SESSION["id"];
        
        //$player2_id = $_GET["challenger_id"]; //getChallengerIdByGameId($connect, $game_id, $id);
        //$player2_id =  getChallengerIdByGameId($connect, $game_id, $_SESSION["id"]);
	//$player1_profile = getProfile($connect, $player1_id);
	//$player2_profile = getProfile($connect, $player2_id);
	
	
	$result = getResult($connect,$game_id);
	
	if($result == 2) {
            
           
	//	echo "Gana (".$player2_profile[1].") : ";
                       
		echo "GANO Jugador Retado  . Volver a la pantalla principal?<a href='Triqui.php'> Si</a>";
	}
	
	else if($result == 1) {
          //      echo "Gana (".$player1_profile[1].") : O";
		echo "GANA RETADOR  . Volver a la pantalla principal?<a href='Triqui.php'> Si</a>";
	}
	
	else if($result == -1) {
		echo "Sin Ganador. Volver a la pantalla principal?<a href='Triqui.php'> Si</a>";
	}
	
	
	