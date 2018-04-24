<?php
require 'config.php'; // arquivo de conexao com o DB que ja faz o mesmo que o metodo sessionStart que no caso é verificar se tem usuarion logado;

if($_SESSION['cLogin']){ // se estiver logado ele faz o processo de remocao no isset ID;
	header("Location: login.php");
	exit();
}

require 'classes/anuncios.class.php';
$a = new Anuncios();

if(isset($_GET['id'])&& !empty($_GET['id'])){
	$a->excluirAnuncio($_GET['id']);
}

header("Location: meus-anuncios.php");

?>