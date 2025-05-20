<?php
  require_once "db/conexao.php";

class Curso {
    public $titulo;
    public $horas;
    public $dias;
    private $aluno;

    // Construtor com validação
    public function __construct($titulo, $horas, $dias, $aluno) {
        if (empty($titulo)) {
            throw new Exception("O campo Título é obrigatório.");
        }
        if (!filter_var($horas, FILTER_VALIDATE_INT) || $horas < 0) {
            throw new Exception("Horas deve ser um número inteiro positivo.");
        }
        if (!filter_var($dias, FILTER_VALIDATE_INT) || $dias < 0) {
            throw new Exception("O campo  Dias é obrigatório.");
        }
        if (empty($aluno)) {
            throw new Exception("O campo Aluno é obrigatório.");
        }
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->aluno = $aluno;
    }
 
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas: <strong>$this->horas</strong> anos<br>";
        echo "<p>Dias: <strong>$this->dias</strong><br>";
        echo "Aluno: <strong>" . $this->aluno . "</strong></p>";
    }

      // Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $database = new Conexao();
        $conn = $database->getConexao();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO curso (titulo, horas, dias) VALUES (:titulo, :horas, :dias)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':horas', $this->horas);
        $stmt->bindParam(':dias', $this->dias);
 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}