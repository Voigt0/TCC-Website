<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Usuario extends Database{
        private $id;
        private $nome;
        private $email;
        private $telefone;
        private $senha;

        public function __construct($id, $nome, $email, $telefone, $senha) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setTelefone($telefone);
            $this->setSenha($senha);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Usuário]<br>".
                    "<br>ID do Usuário: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Email: ".$this->getEmail().
                    "<br>Telefone: ".$this->getTelefone().
                    "<br>Senha: ".$this->getSenha();
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Usuario (usuaNome, usuaEmail, usuaTelefone, usuaSenha) VALUES (:usuaNome, :usuaEmail, :usuaTelefone, :usuaSenha)";
            $params = array(
                ":usuaNome" => $this->getNome(),
                ":usuaEmail" => $this->getEmail(),
                ":usuaTelefone" => $this->getTelefone(),
                ":usuaSenha" => $this->getSenha()
            );
            return self::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Usuario SET usuaNome = :usuaNome, usuaEmail = :usuaEmail, usuaTelefone = :usuaTelefone, usuaSenha = :usuaSenha WHERE usuaId = :usuaId";
            $params = array(
                ":usuaId" => $this->getId(),
                ":usuaNome" => $this->getNome(),
                ":usuaEmail" => $this->getEmail(),
                ":usuaTelefone" => $this->getTelefone(),
                ":usuaSenha" => $this->getSenha()
            );
            return self::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Usuario WHERE usuaId = :usuaId";
            $params = array(
                ":usuaId" => $this->getId()
            );
            return self::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Usuario";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE usuaId like :pesquisa"; break;
                    case(2): $sql .= " WHERE usuaNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE usuaEmail like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE usuaTelefone like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE usuaSenha like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY usuaId";
                $params = array();
            }
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Usuario WHERE usuaId = :usuaId";
            $params = array(':usuaId'=>$id);
            return parent::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($email, $senha){
            $sql = "SELECT usuaId FROM Usuario WHERE usuaEmail = :usuaEmail AND usuaSenha = :usuaSenha";
            $params = array(
                ':usuaEmail' => $email,
                ':usuaSenha' => $senha
            );
            session_start();
            if (self::consulta($sql, $params)) {
                $_SESSION['usuaId'] = self::consulta($sql, $params)[0]['usuaId'];
                return true;
            } else {
                $_SESSION['usuaId'] = "";
                return false;
            }
        }
    }
?>