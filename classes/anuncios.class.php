

<?php

class Anuncios{

	public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado)
 {
		global $pdo; // essa variavel faz a conexao com o banco de dados
		$sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
		$sql->bindValue(":titulo", $titulo); 
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->execute(); # Pega os valores de sql e chama o metodo execute pra adicionar no DB;
	}


	public function excluirAnuncio($id){
		global $pdo;

		$sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio"); //Remove primeiro todas as imagens do anuncio especificado;
		$sql->bindValue(":id_anuncio",$id);
		$sql->execute();


		$sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();
		// remove todos os dados do anuncios especificados;

	}

}

?>