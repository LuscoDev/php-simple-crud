<?php
	require_once('dao/ProdutoDAO.php');

	$produtoDAO = new ProdutoDAO();

	if ( $produtoDAO->deleteProduto(  $_GET['cod'] ) == true ) {
		header('Location: index.php?excluir=1');
	}else{
		header('Location: index.php?excluir=0');
	}
?>