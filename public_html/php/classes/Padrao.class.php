<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Padrao{
        private $id;

        public function __construct() {
            $this->setId($id);
        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            
        }

        //Métodos de persistência
        public function create(){
            
        }
        
       

        public function update(){
            
        }

        public function delete(){
           
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            
        }

    }
?>