<?php
	require_once('dao/ProdutoDAO.php');
	$nome = $_GET['gravarNome'];
	$valor = $_GET['gravarValor'];

	$produtoDAO = new ProdutoDAO();
	if ( $produtoDAO->createProduto($nome, $valor) == true) {
		header('Location: index.php?gravar=1');
	}else{
		header('Location: index.php?gravar=0');
	}
?>