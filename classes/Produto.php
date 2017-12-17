<?php
class Produto{
	private $idProduto=0;
	private $nomeProduto='';
	private $valorProduto=0;



	function Produto($id,$nome,$valor){		
		 $this->idProduto = $id;
		$this->nomeProduto = $nome;
		$this->valorProduto = $valor;
		

	}

	function getIdProduto(){
		return $this->idProduto;
	}
	function setIdProduto( $id ){
		$this->idProduto = $id;		
	}

	function getNomeProduto(){
		return $this->nomeProduto;
	}
	function setNomeProduto( $nome ){
		$this->nomeProduto = $nome;
	}

	function getValorProduto(){
		return $this->valorProduto;
	}
	function setValorProduto( $valor ){
		$this->valorProduto = $valor;
	}

}