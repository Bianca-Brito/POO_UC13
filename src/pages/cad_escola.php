<?php
require __DIR__ . "/../classes/escola.php";

//Inicializa as variáveis
$nome = $CNPJ = $endereco =  $cidade = "";
$escolaCriado = false;

//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $CNPJ = trim($_POST["CNPJ"]);
    $endereco = trim($_POST["endereco"]);
    $cidade = trim($_POST["cidade"]);
    try {
        $escola = new Escola($nome, $CNPJ, $endereco, $cidade);
        $escolaCriado = true;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}
?>

<h2>Cadastro de Curso</h2>
 
<form method="post" class="row g-2 mb-4">
    <div class="col-md-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"
            value="<?= htmlspecialchars($nome) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="CNPJ" class="form-label">CNPJ:</label>
        <input type="text" name="CNPJ" id="CNPJ" class="form-control"
            value="<?= htmlspecialchars($CNPJ) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" name="endereco" id="endereco" class="form-control"
            value="<?= htmlspecialchars($endereco) ?>">
    </div>

    <div class="col-md-2">
    <label for="cidade" class="form-label">Cidade:</label>
    <input type="text" name="cidade" id="cidade" class="form-control"
            value="<?= htmlspecialchars($cidade) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

<?php
if ($escolaCriado){
    echo "<h3>Resultado:</h3>";
    $escola->exibirDados();
}
?>