<?php require 'pages/header.php'; ?>

<div class="container">
	<h1>Meus Anúncios</h1>

	<a href="" class="btn btn-default">Adicionar Anúncio</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Titulo</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tr>
			<td>
				<img src="assets/images/default.jpg" height="50" border="0" />
			</td>
			<td></td>
			<td>R$ </td>
			<td>
				<a href="" class="btn btn-default">Editar</a>
				<a href="" class="btn btn-danger">Excluir</a>
			</td>
		</tr>
	</table>
</div>
<?php require 'pages/footer.php'; ?>