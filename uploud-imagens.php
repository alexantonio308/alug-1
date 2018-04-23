<?php 
// Uploud de imagens (LucaS Aragão)
//******************************************************************
// adcionar a Anuncio.class.php o seguinte trecho abaixo


public function addImagens($titulo, $categoria, $valor, $descricao, $estado, $fotos, $id){
global $pdo;

$sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if(count($fotos) > 0) { // se o usuario quiser mandar fotos (opção opcional)
			for($q=0;$q<count($fotos['tmp_name']);$q++) { 
				$tipo = $fotos['type'][$q]; // verifico o tipo da foto 
				if(in_array($tipo, array('image/jpeg', 'image/png'))) { // especifico que a imagem só pode ser jpg ou png 
					$tmpname = md5(time().rand(0,9999)).'.jpg'; // criando nome do arquivo e definindo que vai ter extão jpg
					move_uploaded_file($fotos['tmp_name'][$q], 'assets/imagens'.$tmpname); // <- pasta imagem n existe (colocar aqui quando o front criar a pasta para imagens)



					$sql = $pdo->prepare("INSERT INTO anuncios_imagens SET id_anuncio = :id_anuncio, url = :url");
					$sql->bindValue(":id_anuncio", $id);
					$sql->bindValue(":url", $tmpname);
					$sql->execute();
					// salvando no banco


}
 
 ?>

<?php 

//******************************************************************************************************************
// quando for integrar o back com o front lembre de aceitar multiplos arquivos no html (o formuario tem q usar enctype)
// adcionar a Anuncios.class.php -> na função AddAnuncio a variavel $_fotos
 

require 'classes/anuncios.class.php';
$a = new Anuncios();
//... recebe tudo de anuncio

if(isset($_FILES['fotos'])) {  // recebimento de imagens
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}

	$a->addImagens($fotos, $_GET['id']);


 ?>