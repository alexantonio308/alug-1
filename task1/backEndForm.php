<?php

include 'Anucios.php';
include 'conexaoBD.php';


$valor_casa=$_POST['valor_casa'];
$email_usuario=$_POST['emailusuario'];
$telefone_usuario=$_POST['estado_conservacao'];
$categoria_casa=$_POST['categoria_field'];
$descricao_casa=$_POST['descricao_casa'];


function trataValores(){
	/*
	Converte as variaveis para seus respectivos tipos especificados;
	*/
	settype($valor_casa, "double");
	settype($telefone_usuario, "integer");
	settype($categoria_casa, "string");
	settype($descricao_casa, "string");
}
function regraValor(){
	global $valor_casa;
	if ($valor_casa<=0) {
	# code...
		echo "valor da casa não pode ser negativo 
		\n ";
	}
}

function criaObjetoAnunciosPOST(){
	global $valor_casa;
	global $email_usuario;
	global $telefone_usuario;
	global $categoria_casa;
	global $descricao_casa;
	$anuncios = new Anuncios($valor_casa,$email_usuario,$telefone_usuario,$categoria_casa,$descricao_casa);

}
function armazenaDadosSQL(){
	global $valor_casa;
	global $email_usuario;
	global $telefone_usuario;
	global $categoria_casa;
	global $descricao_casa;
	global $novo_nome;


	if(isset($_FILES['arquivo'])){
	$extensao = strtolower(substr($_FILES['arquivo']['name'],-4));
	$novo_nome=md5(time()).$extensao;
	$diretorio = "upload/";
	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
	

		$sql_code = "INSERT INTO anuncios (id_usuario,categoria, descricao, valor, telefone, arquivo) VALUES 
		(NULL,'$categoria_casa','$descricao_casa','$valor_casa','$telefone_usuario','$novo_nome')";

	

		$host = "localhost"; //computador onde o servidor de banco de dados esta instalado
		$user = "root"; //seu usuario para acessar o banco
		$pass = ""; //senha do usuario para acessar o banco
		$banco = "alug"; //banco que deseja acessar
		global $conexao;
		global $mysqli;
		$mysqli = new mysqli ($host, $user,$pass,$banco);
		$conexao = mysqli_connect($host, $user) or die (mysql_error());
		$query = "SELECT * FROM anuncios";

		echo $sql_code;

		$sql = $mysqli->query($sql_code) or die($mysqli->error);

		if($sql){
			echo "armazenado no DB";
		}else{
			echo 'error LINHA 77';
		}
		


}
}


trataValores();
regraValor();
criaObjetoAnunciosPOST();
armazenaDadosSQL();


?>

<html>
	<head>
		
	</head>
	<body>
		<h1>Dados inseridos !</h1>
		<?php
		echo $valor_casa."<br>";
		echo $email_usuario."<br>";
		echo $telefone_usuario."<br>";
		echo $categoria_casa."<br>";
		echo $descricao_casa;
		?>
	</body>
</html>
