<?php
    include_once ("../utils/autoload.php");

    class Motor extends Database{
        private $id;
        private $estado;
        private $descricao;
        private $posicaoXY;
        private $posicaoZ;
        private $dispId;

        public function __construct($id, $estado, $descricao, $posicaoXY, $posicaoZ, $dispId) {
            $this->setId($id);
            $this->setEstado($estado);
            $this->setDescricao($descricao);
            $this->setPosicaoXY($posicaoXY);
            $this->setPosicaoZ($posicaoZ);
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

        public function getPosicaoXY() {
            return $this->posicaoXY;
        }

        public function getPosicaoZ() {
            return $this->posicaoZ;
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

        public function setPosicaoXY($posicaoXY) {
            $this->posicaoXY = $posicaoXY;
        }

        public function setPosicaoZ($posicaoZ) {
            $this->posicaoZ = $posicaoZ;
        }

        public function setDispositivoId($dispId) {
            $this->dispId = $dispId;
        }   

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Motor (motoEstado, motoDescricao, motoPosicaoXY, motoPosicaoZ, motor_dispId) VALUES (:motoEstado, :motoDescricao, :motoPosicaoXY, :motoPosicaoZ, :motor_dispId)";
            $params = array(
                ":motoEstado" => $this->getEstado(),
                ":motoDescricao" => $this->getDescricao(),
                ":motoPosicaoXY" => $this->getPosicaoXY(),
                ":motoPosicaoZ" => $this->getPosicaoZ(),
                ":motor_dispId" => $this->getDispositivoId()
            );
            return parent::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Motor SET motoEstado = :motoEstado, motoDescricao = :motoDescricao, motoPosicaoXY = :motoPosicaoXY, motoPosicaoZ = :motoPosicaoZ, motor_dispId = :motor_dispId WHERE motoId = :motoId";
            $params = array(
                ":motoId" => $this->getId(),
                ":motoEstado" => $this->getEstado(),
                ":motoDescricao" => $this->getDescricao(),
                ":motoPosicaoXY" => $this->getPosicaoXY(),
                ":motoPosicaoZ" => $this->getPosicaoZ(),
                ":motor_dispId" => $this->getDispositivoId()
            );
            return parent::comando($sql, $params);
        }

        public function delete(){
            $sql = "DELETE FROM Motor WHERE motoId = :motoId";
            $params = array(
                ":motoId" => $this->getId()
            );
            return parent::comando($sql, $params);
        }


        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Motor, Dispositivo WHERE Motor.motor_dispId = Dispositivo.dispId";
            if ($busca > 0)
                switch($busca){
                    case(1): $sql .= " AND motoId like :pesquisa"; $pesquisa = $pesquisa."%"; break;
                    case(2): $sql .= " AND estado like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " AND motor_dispId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
            if ($busca > 0)
                $params = array(':pesquisa'=>$pesquisa);
            else 
                $params = array();
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Motor WHERE motoId = :motoId";
            $params = array(':motoId'=>$id);
            return parent::consulta($sql, $params);
        }
    }

    //Manipulação de dados de um motor
    $comando = 2;

    //Cadastro de um motor
    if ($comando == 1){
        $motor = new Motor('', 0, "aaaaaaa","140", "30", 2);
        $motor->create();
    }

    //Atualização de um motor
    else if ($comando == 2){
        $motor = new Motor(20, 1, "yy", "60", "110", 3);
        $motor->update();
    }

    //Exclusão de um motor
    else if ($comando == 3){
        $motor = new Motor(4, '', '', '', '', '');
        $motor->delete();
    }

    echo "<pre>";
    print_r($motor);
    echo "</pre>";
    echo "<br>";
    echo "<pre>";
    print_r($motor->consultar());
    echo "</pre>";
?>