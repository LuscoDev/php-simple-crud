<?php
	require_once('dao/ProdutoDAO.php');

	$nomeProduto = $_GET['nomeProduto'];
	$valorProduto = $_GET['valorProduto'];
	$codProduto = $_GET['codProduto'];


	$produtoDao = new ProdutoDAO();

	if ( $produtoDao->updateProduto( $codProduto, $nomeProduto, $valorProduto ) == true ) {
		header('Location: index.php?editar=1');		
	}else{
		header('Location: index.php?editar=0');
	}

?>