<?php
class Anuncios {

	public function getTotalAnuncios($filtros) {
		global $pdo;

		$filtrostring = array('1=1');
		if(!empty($filtros['categoria'])) {
			$filtrostring[] = 'anuncios.id_categoria = :id_categoria';
		}
		if(!empty($filtros['preco'])) {
			$filtrostring[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
		}
		if(!empty($filtros['estado'])) {
			$filtrostring[] = 'anuncios.estado = :estado';
		}

		$sql = $pdo->prepare("SELECT COUNT(*) as c FROM anuncios WHERE ".implode(' AND ', $filtrostring));

		if(!empty($filtros['categoria'])) {
			$sql->bindValue(':id_categoria', $filtros['categoria']);
		}
		if(!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(':preco1', $preco[0]);
			$sql->bindValue(':preco2', $preco[1]);
		}
		if(!empty($filtros['estado'])) {
			$sql->bindValue(':estado', $filtros['estado']);
		}

		$sql->execute();
		$row = $sql->fetch();

		return $row['c'];
	}



	public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado) {
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->execute();
	}

	


}