<html>

	<head>
		<title>Profile</title>
		
		<script type="text/javascript" src="lib/js/miembros.js"></script>
		<script type="text/javascript" src="lib/js/retos.js"></script>
		<script type="text/javascript" src="lib/js/logout.js"></script>
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
		<script type="text/javascript">
			function getMembers() {
				getMembersOnline();
				setTimeout(getMembers, 5000);
			}
			
			function getChallenges() {
				getChallegesFromServer();
				setTimeout(getChallenges, 1000);
			}
			
			function getEverything() {
				getMembers();
				getChallenges();
			}
			
			window.onload = getEverything;
			
			function rejectChallenge() {
				rejectGame();
			}
			
			function logout() {
				logoutProfile();
				window.location.href = "default.php";
			}
			
		</script>
	</head>
	
	<body> 
		<?php
			include("lib/php/PERFIL.php");
			include("lib/php/CONECTAR_DB.php");
			session_start();
			if(!isset($_SESSION["id"])) { echo "Sesion no iniciad."; }
			else {
			$id = $_SESSION["id"];
			$profile_info = getProfile($connect, $id);
			$username = $profile_info[1];
			$email = $profile_info[2];
			$score = $profile_info[3];
		}
		?>
		
		<div id="content">
			<div id="profile"><p id="content">
                                <h1>Tic Tac Toe</h1>
                                <br/>
				<span class="info">Usuario :</span> <?php
					echo $username;
				?><br/>
				<span class="info">Puntaje :</span> <?php
					echo $score;
				?><br/>
                                <div id="logout"><a href="javascript:logout()">SALIR</a></div>
			</p></div>
			<div id="membersheader">Usuarios en Linea :</div>
			<div id="membersonline">	
			</div>
			<div id="challengesheader">Retado por :</div>
			<div id="challenges">
			</div>
		</div>
</html>
