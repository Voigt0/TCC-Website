<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Dispositivo extends Database{
        private $id;
        private $nome;
        private $latitude;
        private $longitude;
        private $descricao;
        private $usuaId;

        public function __construct($id, $nome, $latitude, $longitude, $descricao, $usuaId) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setLatitude($latitude);
            $this->setLongitude($longitude);
            $this->setDescricao($descricao);
            $this->setUsuarioId($usuaId);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getLatitude() {
            return $this->latitude;
        }

        public function getLongitude() {
            return $this->longitude;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getUsuarioId() {
            return $this->usuaId;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setLatitude($latitude) {
            $this->latitude = $latitude;
        }

        public function setLongitude($longitude) {
            $this->longitude = $longitude;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setUsuarioId($usuaId) {
            $this->usuaId = $usuaId;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Dispositivo]<br>".
                    "<br>ID do Dispositivo: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Latitude: ".$this->getLatitude().
                    "<br>Longitude: ".$this->getLongitude().
                    "<br>Descrição: ".$this->getDescricao().
                    "<br>Usuario ID: ".$this->getUsuarioId();
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Dispositivo (dispNome, dispLatitude, dispLongitude, dispDescricao, dispositivo_usuaId) VALUES (:dispNome, :dispLatitude, :dispLongitude, :dispDescricao, :dispositivo_usuaId)";
            $params = array(
                ":dispNome" => $this->getNome(),
                ":dispLatitude" => $this->getLatitude(),
                ":dispLongitude" => $this->getLongitude(),
                ":dispDescricao" => $this->getDescricao(),
                ":dispositivo_usuaId" => $this->getUsuarioId()
            );
            return parent::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Dispositivo SET dispNome = :dispNome, dispLatitude = :dispLatitude, dispLongitude = :dispLongitude, dispDescricao = :dispDescricao, dispositivo_usuaId = :dispositivo_usuaId WHERE dispId = :dispId";
            $params = array(
                ":dispId" => $this->getId(),
                ":dispNome" => $this->getNome(),
                ":dispLatitude" => $this->getLatitude(),
                ":dispLongitude" => $this->getLongitude(),
                ":dispDescricao" => $this->getDescricao(),
                ":dispositivo_usuaId" => $this->getUsuarioId()
            );
            return parent::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Dispositivo WHERE dispId = :dispId";
            $params = array(
                ":dispId" => $this->getId()
            );
            return parent::comando($sql, $params);
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Dispositivo, Usuario 
                    WHERE Dispositivo.dispositivo_usuaId = Usuario.usuaId";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " AND dispId like :pesquisa"; $pesquisa = $pesquisa; break;
                    case(2): $sql .= " AND dispNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " AND dispLatitude like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " AND dispLongitude like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " AND dispDescricao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(6): $sql .= " AND dispositivo_usuaId like :pesquisa"; $pesquisa = $pesquisa; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY dispId";
                $params = array();
            }
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Dispositivo WHERE dispId = :dispId";
            $params = array(':dispId'=>$id);
            return parent::consulta($sql, $params);
        }

        public static function consultarUsuario($id, $busca, $pesquisa){
            $sql = "SELECT dispId, dispNome FROM Dispositivo WHERE dispositivo_usuaId = :usuaId";
            switch ($busca) {
                case(0): $sql .= " AND dispId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                case(1): $sql .= " AND dispNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
            }
            $params = array(':usuaId'=>$id, ':pesquisa'=>$pesquisa);
            return parent::consulta($sql, $params);
        }

        //Métodos de validação
        public static function validar($id, $usuaId) {
            $sql = "SELECT * FROM Dispositivo WHERE dispId = :dispId AND dispositivo_usuaId = :usuaId";
            $params = array(
                ":dispId" => $id,
                ":usuaId" => $usuaId
            );
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (parent::consulta($sql, $params)) {
                $_SESSION['dispId'] = $id;
                return true;
            } else {
                $_SESSION['dispId'] = '';
                return false;
            }
        }
    }
?>