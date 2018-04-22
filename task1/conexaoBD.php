
<?php
$host = "localhost"; //computador onde o servidor de banco de dados esta instalado
$user = "root"; //seu usuario para acessar o banco
$pass = ""; //senha do usuario para acessar o banco
$banco = "alug"; //banco que deseja acessar
global $conexao;
global $mysqli;
$mysqli = new mysqli ($host, $user,$pass,$banco);
$conexao = mysqli_connect($host, $user) or die (mysql_error());
$query = "SELECT * FROM anuncios";
//$xd=mysqli_query($conexao,$query);
//echo $xd;
if($conexao){
	$ok='ok';
}else{
	$ok ='n ok';
}
?>
