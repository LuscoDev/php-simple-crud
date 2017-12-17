<?php
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	require_once('dao/ProdutoDao.php');
	$produtoDao = new ProdutoDao();
	
	$produtoDao->selectusuarios( $usuario, $senha );
?>