<?php


	/**
	* 
	Cria um objeto do tipo anucios que vai conter algumas informacoes basicas da entrada do usuario referente ao arquivo backendform.php
	{Util para adicionar no bd};
	*/
class Anuncios{
		var $valorcasa;
		var $email_usuario;
		var $telefone;
		var $categoria;
		var $descricao;

	/*
		Construtor da classe Anuncios;
	*/
	public	function Anuncios($valorCasa,$emailUsuario,$telefoneUsuario,$categoriaUsuario,$descricaoUsuario){
			$this->valorcasa = $valorCasa;
			$this->email_usuario = $emailUsuario;
			$this->telefone = $telefoneUsuario;
			$this->categoria = $categoriaUsuario;
			$this->descricao = $descricaoUsuario;
		}

	}
?>