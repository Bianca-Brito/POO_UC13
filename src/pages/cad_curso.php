<?php
require_once "src/classes/curso.php";

//Inicializa as variáveis
$titulo = $horas = $dias =  $aluno = "";
$cursoCriado = false;

//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $horas = trim($_POST["horas"]);
    $dias = trim($_POST["dias"]);
    $aluno = trim($_POST["aluno"]);
   
     $curso = new Curso($titulo, $horas, $dias, $aluno);
    $cursoCriado = $curso->cadastrar();
 
    if ($cursoCriado) {
        echo "<div class='alert alert-success'>Cadastro efetuado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar a escola</div>";
    }
}
?>

<h2>Cadastro de Curso</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="título" class="form-label">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control"
            value="<?= htmlspecialchars($titulo) ?>">
    </div>
 
    <div class="col-md-1">
        <label for="horas" class="form-label">Horas:</label>
        <input type="number" name="horas" id="horas" class="form-control"
            value="<?= htmlspecialchars($horas) ?>">
    </div>
 
    <div class="col-md-1">
        <label for="dias" class="form-label">Dias:</label>
        <input type="number" name="dias" id="dias" class="form-control"
            value="<?= htmlspecialchars($dias) ?>">
    </div>

    <div class="col-md-2">
    <label for="aluno" class="form-label">Aluno:</label>
    <input type="text" name="aluno" id="aluno" class="form-control"
            value="<?= htmlspecialchars($aluno) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

<?php
if ($cursoCriado){
    echo "<h3>Resultado:</h3>";
    $curso->exibirDados();
}
?>