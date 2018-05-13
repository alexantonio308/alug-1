<?php require 'pages/header.php'; ?>


<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
require 'classes/categorias.class.php';
$a = new Anuncios();
$u = new Usuarios();
$c = new Categorias();

$filtros = array(
	'categoria' => '',
	'preco' => '',
	'estado' => ''
);
if(isset($_GET['filtros'])) {
	$filtros = $_GET['filtros'];
}

$total_anuncios = $a->getTotalAnuncios($filtros);
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
	$p = addslashes($_GET['p']);
}

$por_pagina = 2;
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $c->getLista();
?>


<div class="container-fluid">
	<div class="jumbotron">
		<h2>Nós temos hoje <?php echo $total_anuncios; ?> anúncios.</h2>
		<p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados.</p>
	</div>


	<div class="row">
		<div class="col-sm-3">
			<h4>Pesquisa Avançada</h4>
		</div>
		<div class="col-sm-9">
			<h4>Últimos Anúncios</h4>
			<table class="table table-striped">
				<tbody>
					<tr>
						<td>
							<img src="assets/images/default.jpg" height="50" border="0">
						</td>
                        <td>
                            <a href="">Jandim Bougainville</a><br>
                            Apartamento Padrão
                        </td>
                        <td>R$ 192,000.00</td>
                    </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require 'pages/footer.php'; ?>