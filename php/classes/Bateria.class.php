<?php
    include_once ("../utils/autoload.php");

    class Bateria extends Database{
        private $id;
        private $estado;
        private $descricao;
        private $carga;
        private $temperatura;
        private $dispId;

        public function __construct($id, $estado, $descricao, $carga, $temperatura, $dispId) {
            $this->setId($id);
            $this->setEstado($estado);
            $this->setDescricao($descricao);
            $this->setCarga($carga);
            $this->setTemperatura($temperatura);
            $this->setDispositivoId($dispId);
        }

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getDescricao() {
            return $this->descricao;
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

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
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
            $sql = "INSERT INTO Bateria (bateEstado, bateDescricao, bateCarga, bateTemperatura, bateria_dispId) VALUES (:bateEstado, :bateDescricao, :bateCarga, :bateTemperatura, :bateria_dispId)";
            $params = array(
                ":bateEstado" => $this->getEstado(),
                ":bateDescricao" => $this->getDescricao(),
                ":bateCarga" => $this->getCarga(),
                ":bateTemperatura" => $this->getTemperatura(),
                ":bateria_dispId" => $this->getDispositivoId()
            );
            return parent::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Bateria SET bateEstado = :bateEstado, bateDescricao = :bateDescricao, bateCarga = :bateCarga, bateTemperatura = :bateTemperatura, bateria_dispId = :bateria_dispId WHERE bateId = :bateId";
            $params = array(
                "bateId" => $this->getId(),
                ":bateEstado" => $this->getEstado(),
                ":bateDescricao" => $this->getDescricao(),
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
                    case(2): $sql .= " AND bateEstado like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " AND bateria_dispId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
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

    //Manipulação de dados de uma bateria
    $comando = 1;

    //Cadastro de uma bateria
    if ($comando == 1){
        $bateria = new Bateria('', '1', "Bateria teste", '100', '60.00', '3');
        $bateria->create();
    }

    //Atualização de uma bateria
    else if ($comando == 2){
        $bateria = new Bateria('32', '0', "xxxxxx", '15', '40.00', '2');
        $bateria->update();
    }

    //Exclusão de uma bateria
    else if ($comando == 3){
        $bateria = new Bateria('16', '', '', '', '', '');
        $bateria->delete();
    }

    echo "<pre>";
    print_r($bateria);
    echo "</pre>";
    echo "<br>";
    echo "<pre>";
    print_r($bateria->consultar());
    echo "</pre>";
?>