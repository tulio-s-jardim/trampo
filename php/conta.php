<?php

require_once 'php/database.php';

class Conta {

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $celular;
    private $bairro_id;

     public function __construct() {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        if(strlen($nome) <= 40) {
            $this->nome = $nome;
            return 1;
        }
        return 0;
    }

    public function setSobrenome($sobrenome){
        if(strlen($sobrenome) <= 40) {
            $this->sobrenome = $sobrenome;
            return 1;
        }
        return 0;
    }

    public function setEmail($email) {
        $this->email = $email;
        return 1;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return 1;
    }

    public function setBairro_id($bairro_id) {
        $this->bairro_id = $bairro_id;
        return 1;
    }

    public function insert(){
        $query = "INSERT INTO conta(nome, sobrenome, email, senha, celular, bairro_id) VALUES (:nome, :sobrenome, :email, :senha, :celular, :bairro_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":sobrenome", $this->sobrenome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":celular", $this->celular);
        $stmt->bindParam(":bairro_id", $this->bairro_id);
        try { 
            $stmt->execute();
            return 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }            
    }

    public function edit(){
        $query = "UPDATE `usuario` SET `email` = :email, `senha` = :senha, `celular` = :celular, `bairro_id` = :bairro_id WHERE `id` = :id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":celular", $this->celular);
        $stmt->bindParam(":bairro_id", $this->bairro_id);
        try { 
            $stmt->execute();
            return 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }            
    }

    public function view() {
        $query = "SELECT * FROM `conta` WHERE `id` = :id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewRecomendacoes() {
        $query = "SELECT * FROM `recomendacoes` WHERE `conta_id` = :id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewRecomendacoesPrestador() {
        $query = "SELECT AVG(nota) AS n FROM `recomendacao` WHERE `conta_id` = :id AND `tipo` = 0 ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewRecomendacoesContratante() {
        $query = "SELECT AVG(nota) AS n FROM `recomendacao` WHERE `conta_id` = :id AND `tipo` = 1 ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewServPrestados() {
        $query = "SELECT *, publicacao.id AS pubid FROM `publicacao` JOIN `categoria` WHERE `publicacao`.`id` = (SELECT publicacao_id FROM recomendacao WHERE conta_id = :id) AND `publicacao`.`categoria_id` = `categoria`.`id`;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewNotasContratante() {
        $query = "SELECT count(nota) AS n FROM `recomendacao` WHERE `conta_id` = :id AND `tipo` = 1 ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewServSolicitados() {
        $query = "SELECT *, publicacao.id AS pubid FROM `publicacao` JOIN `categoria` WHERE `conta_id` = :id AND `publicacao`.`categoria_id` = `categoria`.`id`;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewCategorias() {
        $query = "SELECT * FROM `categoria` ORDER BY nome;";
        $stmt = $this->conn->prepare($query);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function criaPublicacao($categoria_id, $titulo, $descricao, $tipo) {
        $query = "INSERT INTO `publicacao` VALUES (DEFAULT, :conta_id, :categoria_id, :titulo, :descricao, 0, :tipo);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":conta_id", $this->id);
        $stmt->bindParam(":categoria_id", $categoria_id);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":tipo", $tipo);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewPublicacao($id) {
        $query = "SELECT *, conta.nome AS pnome, categoria.nome AS cnome FROM `publicacao` JOIN categoria JOIN conta WHERE categoria.id = :id AND conta_id = conta.id AND categoria.id = categoria_id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}