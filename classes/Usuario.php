<?php
class Usuario{
	private $nomeUsuario;
	private $senha;

	function Usuario($usuario, $senha){
		$this->nomeUsuario = $usuario;
		$this->senha = $senha;
	}

	function getNomeUsuario(){
		return $this->nomeUsuario;
	}

	function getSenha(){
		return $this->senha;
	}	

}