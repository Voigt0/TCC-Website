<?php
    include_once ("../utils/autoload.php");

    class Usuario extends Database{
        private $id;
        private $nome;
        private $nascimento;
        private $email;
        private $telefone;
        private $login;
        private $senha;

        public function __construct($id, $nome, $nascimento, $email, $telefone, $login, $senha) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setNascimento($nascimento);
            $this->setEmail($email);
            $this->setTelefone($telefone);
            $this->setLogin($login);
            $this->setSenha($senha);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getNascimento() {
            return $this->nascimento;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getLogin() {
            return $this->login;
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

        public function setNascimento($nascimento) {
            $this->nascimento = $nascimento;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Usuário]<br>".
                    "<br>ID do Usuário: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Nascimento: ".$this->getNascimento().
                    "<br>Email: ".$this->getEmail().
                    "<br>Telefone: ".$this->getTelefone().
                    "<br>Login: ".$this->getLogin().
                    "<br>Senha: ".$this->getSenha().
                    "<br>Situação: ";
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Usuario (nome, nascimento, email, telefone, login, senha) VALUES (:nome, :nascimento, :email, :telefone, :login, :senha)";
            $params = array(
                ":nome" => $this->getNome(),
                ":nascimento" => $this->getNascimento(),
                ":email" => $this->getEmail(),
                ":telefone" => $this->getTelefone(),
                ":login" => $this->getLogin(),
                ":senha" => $this->getSenha()
            );
            return self::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Usuario SET nome = :nome, nascimento = :nascimento, email = :email, telefone = :telefone, login = :login, senha = :senha WHERE idusuario = :idusuario";
            $params = array(
                ":idusuario" => $this->getId(),
                ":nome" => $this->getNome(),
                ":nascimento" => $this->getNascimento(),
                ":email" => $this->getEmail(),
                ":telefone" => $this->getTelefone(),
                ":login" => $this->getLogin(),
                ":senha" => $this->getSenha()
            );
            return self::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Usuario WHERE idusuario = :idusuario";
            $params = array(
                ":idusuario" => $this->getId()
            );
            return self::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM usuario";
            if ($busca > 0)
                switch($busca){
                    case(1): $sql .= " WHERE idusuario like :pesquisa"; $pesquisa = $pesquisa."%"; break;
                    case(2): $sql .= " WHERE nome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE login like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
            if ($busca > 0)
                $params = array(':pesquisa'=>$pesquisa);
            else 
                $params = array();
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM usuario WHERE idusuario = :idusuario";
            $params = array(':idusuario'=>$id);
            return parent::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($login, $senha){
            $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
            $params = array(
                ':login' => $login,
                ':senha' => $senha
            );
            return self::consulta($sql, $params);
        }
    }

    //Manipulação de dados de um usuário
    $comando = 3;

    //Cadastro de um usuário
    if ($comando == 1){
        $nome = "João";
        $nascimento = "2000-01-01";
        $email = "joaoteste@gmail.com";
        $telefone = "47 991232312";
        $login = "joao";
        $senha = "123";
        $usuario = new Usuario('', $nome, $nascimento, $email, $telefone, $login, $senha);
        $usuario->create();
    }

    //Atualização de um usuário
    else if ($comando == 2){
        $id = 2;
        $nome = "Valdir";
        $nascimento = "1948-04-08";
        $email = "asjdjds@gmail.com";
        $telefone = "47 888888888";
        $login = "lkjdslk";
        $senha = "120983";
        $usuario = new Usuario($id, $nome, $nascimento, $email, $telefone, $login, $senha);
        $usuario->update();
    }

    //Exclusão de um usuário
    else if ($comando == 3){
        $id = 2;
        $usuario = new Usuario($id, '', '', '', '', '', '');
        $usuario->delete();
    }

    echo "<pre>";
    print_r($usuario);
    echo "</pre>";
    echo "<br>";
    echo "<pre>";
    print_r($usuario->consultar());
    echo "</pre>";

?>