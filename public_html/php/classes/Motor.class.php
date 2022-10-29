<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Motor extends Database{
        private $id;
        // private $estado;
        // private $descricao;
        private $posicaoXY;
        private $posicaoZ;
        private $dispId;

        // public function __construct($id, $estado, $descricao, $posicaoXY, $posicaoZ, $dispId) {
        public function __construct($id, $posicaoXY, $posicaoZ, $dispId) {
            $this->setId($id);
            // $this->setEstado($estado);
            // $this->setDescricao($descricao);
            $this->setPosicaoXY($posicaoXY);
            $this->setPosicaoZ($posicaoZ);
            $this->setDispositivoId($dispId);
        }

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        // public function getEstado() {
        //     return $this->estado;
        // }

        // public function getDescricao() {
        //     return $this->descricao;
        // }

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

        // public function setEstado($estado) {
        //     $this->estado = $estado;
        // }

        // public function setDescricao($descricao) {
        //     $this->descricao = $descricao;
        // }

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
        // public function create(){
        //     $sql = "INSERT INTO Motor (motoEstado, motoDescricao, motoPosicaoXY, motoPosicaoZ, motor_dispId) VALUES (:motoEstado, :motoDescricao, :motoPosicaoXY, :motoPosicaoZ, :motor_dispId)";
        //     $params = array(
        //         ":motoEstado" => $this->getEstado(),
        //         ":motoDescricao" => $this->getDescricao(),
        //         ":motoPosicaoXY" => $this->getPosicaoXY(),
        //         ":motoPosicaoZ" => $this->getPosicaoZ(),
        //         ":motor_dispId" => $this->getDispositivoId()
        //     );
        //     return parent::comando($sql, $params);
        // }

 

        // public function update(){
        //     $sql = "UPDATE Motor SET motoEstado = :motoEstado, motoDescricao = :motoDescricao, motoPosicaoXY = :motoPosicaoXY, motoPosicaoZ = :motoPosicaoZ, motor_dispId = :motor_dispId WHERE motoId = :motoId";
        //     $params = array(
        //         ":motoId" => $this->getId(),
        //         ":motoEstado" => $this->getEstado(),
        //         ":motoDescricao" => $this->getDescricao(),
        //         ":motoPosicaoXY" => $this->getPosicaoXY(),
        //         ":motoPosicaoZ" => $this->getPosicaoZ(),
        //         ":motor_dispId" => $this->getDispositivoId()
        //     );
        //     return parent::comando($sql, $params);
        // }
        
        public function update(){
            $sql = "UPDATE Motor SET motoPosicaoXY = :motoPosicaoXY, motoPosicaoZ = :motoPosicaoZ, motor_dispId = :motor_dispId WHERE motoId = :motoId";
            $params = array(
                ":motoId" => $this->getId(),
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
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " AND motoId like :pesquisa"; break;
                    // case(2): $sql .= " AND motoEstado like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    // case(3): $sql .= " AND motoDescricao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
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
            return parent::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Motor WHERE motor_dispId = :dispId";
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


        
        public static function consultarDispositivo($id){
            $sql = "SELECT dispEstado FROM Dispositivo WHERE dispId = :dispId";
            $params = array(':dispId'=>$id);
            return parent::consulta($sql, $params);
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
        
        public function updateSemChave($ultimaAlteracao) {
            $sql = "UPDATE Dispositivo, Motor SET `motoPosicaoXY` = :motoPosicaoXY, `motoPosicaoZ` = :motoPosicaoZ, `dispUltimaAlteracao` = :dispUltimaAlteracao 
                    WHERE `dispId` = :dispId
                    AND dispId = motor_dispId";
            $params = array(
                            ":motoPosicaoXY" => $this->getPosicaoXY(),
                            ":motoPosicaoZ" => $this->getPosicaoZ(),
                            ":dispUltimaAlteracao" => $ultimaAlteracao,
                            ":dispId" => $this->getDispositivoId()
                            );
            Database::comando($sql, $params);
            return true;
        }
    }
?>