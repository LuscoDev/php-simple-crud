<?php
class Produto{
	$idProduto;
	$nomeProduto;
	$valorProduto;

	function Produto(){		
	}

	function getIdProduto(){
		return this->idProduto;
	}
	function setIdProduto( $id ){
		this->idProduto = $id;
	}

	function getNomeProduto(){
		return this->nomeProduto;
	}
	function setNomeProduto( $nome ){
		this->nomeProduto = $nome;
	}

	function getValorProduto(){
		return this->valorProduto;
	}
	function setValorProduto( $valor ){
		this->valorProduto = $valor;
	}

}