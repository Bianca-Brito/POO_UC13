<?php
 
 require_once "db/conexao.php";

class Aluno {
    public $nome;
    public $idade;
    private $cpf;
    public $curso;

    // Construtor com validação
    public function __construct($nome, $idade, $cpf, $curso) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (!filter_var($idade, FILTER_VALIDATE_INT) || $idade < 0) {
            throw new Exception("A Idade deve ser um número inteiro positivo.");
        }
        if (empty($cpf)) {
            throw new Exception("O campo CPF é obrigatório.");
        }
        if (empty($curso)) {
            throw new Exception("O campo Curso é obrigatório.");
        }
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->curso = $curso;
    }
 
    // Getter do CPF (encapsulamento)
    public function getCpf() {
        return $this->cpf;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Idade: <strong>$this->idade</strong> anos<br>";
        echo "CPF: <strong>" . $this->getCpf() . "</strong></p>";
        echo "<p>Curso: <strong>$this->curso</strong><br>";
    }

     // Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $database = new Conexao();
        $conn = $database->getConexao();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO aluno (nome, idade, cpf) VALUES (:nome, :idade, :cpf)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cpf', $this->cpf);
      
 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
 