<?php
    include_once(__DIR__."/../util/Connection.php");
    include_once(__DIR__."/../model/Projeto.php");
    class ProjetoDao{

        private PDO $conn;

        public function __construct(){
            $this->conn = Connection::getConnection();
        }
        public function list(){
            $sql= "SELECT * FROM projetos;";

            $stm= $this->conn->prepare($sql);
            $stm->execute();
            $result= $stm->fetchAll();
            return $this->map($result);
        }
        private function map (array $result) {
            $projetos = array();
            foreach($result as $r) {
                $projeto = new Projeto();
                $projeto->setId($r["id"]);
                $projeto->setNome($r["nome"]);
                array_push($projetos, $projeto);
            }
            return $projetos;
        }
    }

?>