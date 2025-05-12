<?php
 
class Escola {
    public $nome;
    private $CNPJ;
    public $endereco;
    public $cidade;

    // Construtor com validação
    public function __construct($nome, $CNPJ, $endereco, $cidade) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (empty($CNPJ))   {
            throw new Exception("o Campo CNPJ é obrigatório.");
        }
        if (empty($endereco))   {
            throw new Exception("O campo  Endereço é obrigatório.");
        }
        if (empty($cidade)) {
            throw new Exception("O campo Cidade é obrigatório.");
        }
        $this->nome = $nome;
        $this->CNPJ = $CNPJ;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
    }
 
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "CNPJ: <strong>$this->CNPJ</strong> <br>";
        echo "<p>Endereço: <strong>$this->endereco</strong><br>";
        echo "Cidade: <strong>" . $this->cidade . "</strong></p>";
    }
}