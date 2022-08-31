<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Bateria extends Database{
        private $id;
        private $carga;
        private $temperatura;
        private $dispId;

        public function __construct($id, $carga, $temperatura, $dispId) {
            $this->setId($id);
            $this->setCarga($carga);
            $this->setTemperatura($temperatura);
            $this->setDispositivoId($dispId);
        }

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getCarga() {
            return $this->carga;
        }

        public function getTemperatura() {
            return $this->temperatura;
        }

        public function getDispositivoId() {
            return $this->dispId;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setCarga($carga) {
            $this->carga = $carga;
        }

        public function setTemperatura($temperatura) {
            $this->temperatura = $temperatura;
        }

        public function setDispositivoId($dispId) {
            $this->dispId = $dispId;
        }   

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Bateria (bateCarga, bateTemperatura, bateria_dispId) VALUES (:bateCarga, :bateTemperatura, :bateria_dispId)";
            $params = array(
                ":bateCarga" => $this->getCarga(),
                ":bateTemperatura" => $this->getTemperatura(),
                ":bateria_dispId" => $this->getDispositivoId()
            );
            return parent::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Bateria SET bateCarga = :bateCarga, bateTemperatura = :bateTemperatura, bateria_dispId = :bateria_dispId WHERE bateId = :bateId";
            $params = array(
                "bateId" => $this->getId(),
                ":bateCarga" => $this->getCarga(),
                ":bateTemperatura" => $this->getTemperatura(),
                ":bateria_dispId" => $this->getDispositivoId()
            );
            return parent::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Bateria WHERE bateId = :bateId";
            $params = array(
                ":bateId" => $this->getId()
            );
            return parent::comando($sql, $params);
        }


        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Bateria, Dispositivo WHERE Bateria.bateria_dispId = Dispositivo.dispId";
            if ($busca > 0)
                switch($busca){
                    case(1): $sql .= " AND bateId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(2): $sql .= " AND bateria_dispId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
            if ($busca > 0)
                $params = array(':pesquisa'=>$pesquisa);
            else 
                $params = array();
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Bateria WHERE bateId = :bateId";
            $params = array(
                ":bateId" => $id
            );
            return parent::consulta($sql, $params);
        }
        
    }
?>