<?php
class ProdutoDAO{

	function createProduto($nome, $valor){
		require_once('classes/Conecta.php');
		$con = null;
		$sql = "INSERT INTO produtos ( produto, valor ) VALUES ('". $nome ."', ". $valor .") ";
		try {
			$conexao = new Conecta();
			$con = $conexao->getConexao();
			$stmt = $con->prepare($sql);
			$stmt->execute();
			if( $stmt->rowCount() > 0 ){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function updateProduto( $id, $nome, $valor ){
		require_once('classes/Conecta.php');
		$con = null;
		$sql = "UPDATE produtos SET produto = '".$nome."', valor = ".$valor." WHERE idProduto = ".$id;		
		try {
			$conexao = new Conecta();
			$con = $conexao->getConexao();
			$stmt = $con->prepare($sql);
			$stmt->execute();
			if( $stmt->rowCount() > 0 ){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}finally{
			$con = null;
		}
	}

	function deleteProduto( $id ){
		require_once('classes/Conecta.php');
		$con = null;
		$sql = "DELETE FROM produtos WHERE idProduto=".$id;
		try {
			$conexao = new Conecta();
			$con = $conexao->getConexao();
			$stmt = $con->prepare($sql);
			$stmt->execute();
			if ( $stmt->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}finally{
			$con = null;
		}
	}

	function selectUsuarios($nomeUsuario, $senha){
		session_start();
		require_once('classes/Conecta.php');
		require_once('classes/Usuario.php');

		$con = null;
		$sql = "SELECT * FROM usuarios WHERE `nome-usuario` = '".$nomeUsuario."' AND `senha` = '".$senha."'";		
		try {
			$conexao = new Conecta();
			$con = $conexao->getConexao();
			$rs = $con->query($sql);			
			$usuario;			

			while ( $row = $rs->fetchObject() ) {
					$usuario = new Usuario( $row->nome-usuario, $row->senha );					
					$_SESSION['login'] = $nomeUsuario;
					$_SESSION['senha'] = $senha;

					header("Location: index.php");
					return true;
			}			
			header("Location: home.php?invalido=1");				
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}		
	}

	function selectProdutos(){
		require_once('classes/Conecta.php');
		require_once('classes/Produto.php');
		$con = null;
		$produtos = array();
		try {
			$conexao = new Conecta();
			$con = $conexao->getConexao();
			$sql = "SELECT * FROM produtos";
			$stmt = $con->query($sql);
			while ($row = $stmt->fetchObject()) {
				$produto = new Produto((int) $row->idProduto, $row->produto,(float)$row->valor );			
				
				array_push($produtos, $produto);
				//echo $row->idProduto."";	
			}						
		} catch (PDOException $e) {
			echo $e->getMessage();
		}finally{
			$con = null;
		}		
		return $produtos;
	}
}