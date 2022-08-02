<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Dispositivo extends Database{
        private $id;
        private $nome;
        private $localizacao;
        private $descricao;
        private $usuaId;

        public function __construct($id, $nome, $localizacao, $descricao, $usuaId) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setLocalizacao($localizacao);
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

        public function getLocalizacao() {
            return $this->localizacao;
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

        public function setLocalizacao($localizacao) {
            $this->localizacao = $localizacao;
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
                    "<br>Localizacao: ".$this->getLocalizacao().
                    "<br>Descrição: ".$this->getDescricao().
                    "<br>Usuario ID: ".$this->getUsuarioId();
            return $str;
        }

        //Métodos de persistência
        public function create(){
            $sql = "INSERT INTO Dispositivo (dispNome, dispLocalizacao, dispDescricao, dispositivo_usuaId) VALUES (:dispNome, :dispLocalizacao, :dispDescricao, :dispositivo_usuaId)";
            $params = array(
                ":dispNome" => $this->getNome(),
                ":dispLocalizacao" => $this->getLocalizacao(),
                ":dispDescricao" => $this->getDescricao(),
                ":dispositivo_usuaId" => $this->getUsuarioId()
            );
            return parent::comando($sql, $params);
        }

        public function update(){
            $sql = "UPDATE Dispositivo SET dispNome = :dispNome, dispLocalizacao = :dispLocalizacao, dispDescricao = :dispDescricao, dispositivo_usuaId = :dispositivo_usuaId WHERE dispId = :dispId";
            $params = array(
                ":dispId" => $this->getId(),
                ":dispNome" => $this->getNome(),
                ":dispLocalizacao" => $this->getLocalizacao(),
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
                    case(3): $sql .= " AND dispLocalizacao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " AND dispDescricao like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " AND dispositivo_usuaId like :pesquisa"; $pesquisa = $pesquisa; break;
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

    }


    // //Manipulação de dados de um dispositivo
    // $comando = 3;

    // //Cadastro de um dispositivo
    // if ($comando == 1){
    //     $dispositivo = new Dispositivo('', "Placa 542", "Fazenda maluca", "Placa maluca na", '4');
    //     $dispositivo->create();
    // }

    // //Atualização de um dispositivo
    // else if ($comando == 2){
    //     $dispositivo = new Dispositivo("2", "Valdir", "Casa maluca", "Placa maluca na casa 2345678", 1);
    //     $dispositivo->update();
    // }

    // //Exclusão de um dispositivo
    // else if ($comando == 3){
    //     $dispositivo = new Dispositivo("134", '', '', '', '');
    //     $dispositivo->delete();
    // }

    // echo "<pre>";
    // print_r($dispositivo);
    // echo "</pre>";
    // echo "<br>";
    // echo "<pre>";
    // print_r($dispositivo->consultar());
    // echo "</pre>";

?>