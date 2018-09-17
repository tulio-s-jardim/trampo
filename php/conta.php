<?php

require_once 'php/database.php';

class Conta {

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $celular;
    private $cep;

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

    public function setCelular($email) {
        $this->celular = $email;
        return 1;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return 1;
    }

    public function setCep($cep) {
        $this->cep = $cep;
        return 1;
    }

    function myUrlEncode($string) {
        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
        return str_replace($entities, $replacements, rawurlencode($string));
    }

    public function insert(){
        $query = "INSERT INTO conta(nome, sobrenome, email, senha, celular, cep) VALUES (:nome, :sobrenome, :email, :senha, :celular, :cep)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":sobrenome", $this->sobrenome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":celular", $this->celular);
        $stmt->bindParam(":cep", $this->cep);
        try { 
            $stmt->execute();
            return 1;
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }            
    }

    public function edit(){
        $query = "UPDATE `conta` SET `email` = :email, `senha` = :senha, `celular` = :celular, `cep` = :cep WHERE `id` = :id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":celular", $this->celular);
        $stmt->bindParam(":cep", $this->cep);
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

    public function viewPerfil($id) {
        $query = "SELECT * FROM `conta` WHERE `id` = :id ;";
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

    public function existe($email, $senha) {
        $query = "SELECT * FROM conta WHERE email = :email AND senha = :senha ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if(!empty($result)) {
                return $result->id;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function exists($id) {
        $query = "SELECT id FROM conta WHERE id = :id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return !empty($stmt->fetch(PDO::FETCH_OBJ));
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function estaCadastrado($celular, $email) {
        $query = "SELECT * FROM `conta` WHERE `celular` = :celular AND `email` = :email ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":celular", $celular);
        $stmt->bindParam(":email", $email);
        try {
            $stmt->execute();
            $x = $stmt->fetch(PDO::FETCH_OBJ);
            return !empty($x);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function estaCadastradoCelular($celular) {
        $query = "SELECT * FROM `conta` WHERE `celular` = :celular";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":celular", $celular);
        try {
            $stmt->execute();
            $x = $stmt->fetch(PDO::FETCH_OBJ);
            return !empty($x);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function estaCadastradoEmail($email) {
        $query = "SELECT * FROM `conta` WHERE `email` = :email ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        try {
            $stmt->execute();
            $x = $stmt->fetch(PDO::FETCH_OBJ);
            return !empty($x);
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
        $query = "SELECT AVG(nota) AS n FROM `respostas` WHERE `conta_id` = :id;";
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
        $query = "SELECT AVG(nota) AS n FROM `publicacao` WHERE `conta_id` = :id;";
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

    public function viewMeusServPrestados($id) {
        $query = "SELECT *, publicacao.id AS pubid FROM `publicacao` JOIN `categoria` WHERE `publicacao`.`id` IN (SELECT publicacao_id FROM respostas WHERE respostas.conta_id = :id AND nota IS NOT NULL) AND `publicacao`.`categoria_id` = `categoria`.`id` ORDER BY publicacao.id DESC;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewServPrestados($id) {
        $query = "SELECT * FROM `publicacao` WHERE `publicacao`.`id` IN (SELECT publicacao_id FROM respostas WHERE respostas.conta_id = :id AND nota IS NOT NULL) ORDER BY publicacao.id DESC;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewNotasContratante() {
        $query = "SELECT count(nota) AS n FROM `publicacao` WHERE `conta_id` = :id AND `nota` IS NOT NULL ;";
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

    public function viewServSolicitados($id) {
        $query = "SELECT *, publicacao.id AS pubid FROM `publicacao` JOIN `categoria` WHERE `conta_id` = :id AND `publicacao`.`categoria_id` = `categoria`.`id` ORDER BY publicacao.id DESC;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewCategorias() {
        $query = "SELECT * FROM `categoria` WHERE nome <> 'Outros' ORDER BY nome;";
        $stmt = $this->conn->prepare($query);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewOutros() {
        $query = "SELECT * FROM `categoria` WHERE nome = 'Outros' ORDER BY nome;";
        $stmt = $this->conn->prepare($query);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewCategoria($id) {
        $query = "SELECT * FROM `categoria` WHERE id = :id ;";
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

    public function criaPublicacao($categoria_id, $titulo, $descricao) {
        $query = "INSERT INTO `publicacao` VALUES (DEFAULT, :conta_id, :categoria_id, :titulo, :descricao, 0, NULL);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":conta_id", $this->id);
        $stmt->bindParam(":categoria_id", $categoria_id);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":descricao", $descricao);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewPublicacao($id) {
        $query = "SELECT *, conta.nome AS pnome, categoria.nome AS cnome FROM `publicacao` JOIN categoria JOIN conta WHERE publicacao.id = :id AND conta_id = conta.id AND categoria.id = categoria_id;";
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

    public function viewPublicacaoCompleta($id) {
        $query = "SELECT conta.id, conta.nome, conta.sobrenome FROM `publicacao` JOIN respostas JOIN conta WHERE publicacao.id = :id AND respostas.visualizado = 2 AND respostas.conta_id = conta.id;";
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

    public function viewPublicacoesArea($id, $area) {
        $query = "SELECT *, publicacao.id AS pid, categoria.id AS cid FROM `publicacao` JOIN categoria JOIN conta WHERE categoria_id = :id AND categoria.id = :id AND conta.id = publicacao.conta_id AND conta.cep LIKE :area AND (SELECT count(visualizado) FROM respostas WHERE publicacao_id = :id AND visualizado = 2) > 0 ORDER BY publicacao.id DESC;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":area", $area);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewRespostas($id) {
        $query = "SELECT * FROM `respostas` JOIN `conta` WHERE publicacao_id = :id AND conta_id = conta.id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewRespostasNLidas($id) {
        $query = "SELECT * FROM `respostas` JOIN `conta` WHERE publicacao_id = :id AND conta_id = conta.id AND respostas.visualizado = 0;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function lerRespostas($id) {
        $query = "UPDATE respostas SET visualizado = 1 WHERE publicacao_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function viewRespostasGerais() {
        $query = "SELECT DISTINCT publicacao.id, publicacao.titulo FROM `respostas` JOIN publicacao WHERE publicacao.conta_id = :id AND (SELECT COUNT(*) FROM respostas WHERE publicacao_id = publicacao.id AND respostas.visualizado = 0) > 0 ORDER BY publicacao.id DESC;";
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

    public function viewResposta($id, $conta) {
        $query = "SELECT * FROM `respostas` JOIN conta WHERE publicacao_id = :id AND conta_id = :conta AND conta_id = conta.id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":conta", $conta);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function countRespostas() {
        $query = "SELECT count(visualizado) AS c FROM `respostas` JOIN publicacao WHERE publicacao_id = publicacao.id AND publicacao.conta_id = :id AND visualizado = 0;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->c;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function insereResposta($id) {
        $query = "INSERT INTO respostas (conta_id, publicacao_id) VALUES (:cid, :id);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cid", $this->id);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function deletaResposta($id) {
        $query = "DELETE FROM respostas WHERE publicacao_id = :id AND conta_id = :cid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cid", $this->id);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function respondi($id) {
        $query = "SELECT * FROM respostas WHERE publicacao_id = :id AND conta_id = :cid;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cid", $this->id);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return !empty($stmt->fetch(PDO::FETCH_OBJ));
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function respondido($id) {
        $query = "SELECT count(*) AS c FROM respostas WHERE publicacao_id = :id AND visualizado = 2;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->c >= 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function resolve($id, $cid, $nota) {
        $query = "UPDATE respostas SET visualizado = 2, nota = :nota WHERE publicacao_id = :id AND conta_id = :cid;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cid", $cid);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nota", $nota);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function clienteDe($id) {
        $query = "SELECT publicacao_id FROM respostas JOIN publicacao WHERE publicacao.conta_id = :id AND publicacao_id = publicacao.id AND visualizado = 2 AND respostas.conta_id = :uid;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":uid", $this->id);
        try {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(empty($result))
                return 0;
            else
                return $result[0]->publicacao_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function resolveCliente($pid, $nota) {
        $query = "UPDATE publicacao SET nota = :nota WHERE publicacao.id = :pid;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":pid", $pid);
        $stmt->bindParam(":nota", $nota);
        try {
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}