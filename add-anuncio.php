<?php require 'pages/header.php'?>

    <div class="container">
        <h1>Meus Anúncios - Adicionar Anúncio</h1>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria" class="form-control">
                    <option value="1">Apartamento Padrão</option>
                    <option value="2">Casa de Condomínio</option>
                    <option value="3">Casa Padrão</option>
                    <option value="4">Hotel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" />
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" class="form-control" />
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textearea class="form-control" name="descricao"></textearea>
            </div>
            <div class="form-group">
                <label for="estado">Estado de Conservação:</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="0">Ruim</option>
                    <option value="1">Bom</option>
                    <option value="2">Ótimo</option>
                </select>
            </div>
            <input type="submit" value="Adicionar" class="btn btn-default" />
        </form>
    </div>

<?php require 'pages/footer.php'?>