<?php
 
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
}