<?php
    include_once(__DIR__."/../util/Connection.php");
    include_once(__DIR__."/../model/Usuario.php");
    class UsuarioDao{

        private PDO $conn;

        public function __construct(){
            $this->conn = Connection::getConnection();
        }
        public function list(){
            $sql= "SELECT * FROM usuarios;";

            $stm= $this->conn->prepare($sql);
            $stm->execute();
            $result= $stm->fetchAll();
            return $this->map($result);
        }
        private function map (array $result) {
            $usuarios = array();
            foreach($result as $r) {
                $usuario = new Usuario();
                $usuario->setId($r["id"]);
                $usuario->setNome($r["nome"]);
                array_push($usuarios, $usuario);
            }
            return $usuarios;
        }
    }

?>