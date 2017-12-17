<?php
	session_start();
	if ( isset( $_SESSION['login'] ) ) {
		unset( $_SESSION['login'] );
		unset( $_SESSION['senha'] );
		header("Location: home.php");
	}

		
?>