<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Motor{
        private $id;
        private $posicaoXY;
        private $posicaoZ;
        private $dispositivo;

        public function __construct($id, $posicaoXY, $posicaoZ, Dispositivo $dispositivo) {
            $this->setId($id);
            $this->setPosicaoXY($posicaoXY);
            $this->setPosicaoZ($posicaoZ);
            $this->setDispositivo($dispositivo);
        }

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getPosicaoXY() {
            return $this->posicaoXY;
        }

        public function getPosicaoZ() {
            return $this->posicaoZ;
        }

        public function getDispositivo() {
            return $this->dispositivo;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setPosicaoXY($posicaoXY) {
            $this->posicaoXY = $posicaoXY;
        }

        public function setPosicaoZ($posicaoZ) {
            $this->posicaoZ = $posicaoZ;
        }

        public function setDispositivo($dispositivo) {
            $this->dispositivo = $dispositivo;
        }   
        
        public function update(){
            $sql = "UPDATE Motor SET motoPosicaoXY = :motoPosicaoXY, motoPosicaoZ = :motoPosicaoZ, motor_dispId = :motor_dispId WHERE motoId = :motoId";
            $params = array(
                ":motoId" => $this->getId(),
                ":motoPosicaoXY" => $this->getPosicaoXY(),
                ":motoPosicaoZ" => $this->getPosicaoZ(),
                ":motor_dispId" => $this->getDispositivo()->getId()
            );
            Database::comando($sql, $params);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM Motor WHERE motoId = :motoId";
            $params = array(
                ":motoId" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
        }


        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Motor, Dispositivo WHERE Motor.motor_dispId = Dispositivo.dispId";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " AND motoId like :pesquisa"; break;
                    case(4): $sql .= " AND motoPosicaoXY like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " AND motoPosicaoZ like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(6): $sql .= " AND motor_dispId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
                print_r($params);
                die();
            } else {
                $sql .= " ORDER BY motoId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Motor WHERE motor_dispId = :dispId";
            $params = array(':dispId'=>$id);
            return Database::consulta($sql, $params);
        }
        
        
        public static function consultarUsuario($id, $busca, $pesquisa){
            $sql = "SELECT dispId, dispNome FROM Dispositivo WHERE dispositivo_usuaId = :usuaId";
            switch ($busca) {
                case(0): $sql .= " AND dispId like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                case(1): $sql .= " AND dispNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
            }
            $params = array(':usuaId'=>$id, ':pesquisa'=>$pesquisa);
            return Database::consulta($sql, $params);
        }


        
        public static function consultarDispositivo($id){
            $sql = "SELECT dispEstado FROM Dispositivo WHERE dispId = :dispId";
            $params = array(':dispId'=>$id);
            return Database::consulta($sql, $params);
        }

        //Outros métodos
        public function updateComChave($dispChave, $ultimaAlteracao) {
            $sql = "UPDATE Dispositivo, Motor SET `motoPosicaoXY` = :motoPosicaoXY, `motoPosicaoZ` = :motoPosicaoZ, `dispUltimaAlteracao` = :dispUltimaAlteracao 
                    WHERE `dispChave` = :dispChave
                    AND dispId = motor_dispId";
            $params = array(
                            ":motoPosicaoXY" => $this->getPosicaoXY(),
                            ":motoPosicaoZ" => $this->getPosicaoZ(),
                            ":dispUltimaAlteracao" => $ultimaAlteracao,
                            ":dispChave" => $dispChave
                            );
            Database::comando($sql, $params);
            return true;
        }
        
        public function updateSemChave($estado, $ultimaAlteracao) {
            $sql = "UPDATE Dispositivo, Motor SET `motoPosicaoXY` = :motoPosicaoXY, `motoPosicaoZ` = :motoPosicaoZ, `dispUltimaAlteracao` = :dispUltimaAlteracao, `dispEstado` = :dispEstado
                    WHERE `dispId` = :dispId
                    AND dispId = motor_dispId";
            $params = array(
                            ":motoPosicaoXY" => $this->getPosicaoXY(),
                            ":motoPosicaoZ" => $this->getPosicaoZ(),
                            ":dispUltimaAlteracao" => $ultimaAlteracao,
                            ":dispEstado" => $estado,
                            ":dispId" => $this->getDispositivo()->getId()
                            );
            Database::comando($sql, $params);
            return true;
        }
        
        
    }
?>