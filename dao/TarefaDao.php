<?php

    include_once(__DIR__."/../util/Connection.php");
    include_once(__DIR__."/../model/Tarefa.php");
    include_once(__DIR__."/../model/Projeto.php");
    include_once(__DIR__."/../model/Usuario.php");
    class TarefaDao{

        private PDO $conn;

        public function __construct(){
            $this->conn = Connection::getConnection();
        }
        public function list(){ // TODO 
            $sql = "SELECT t.*, p.nome AS nome_projeto, u.nome AS nome_usuario FROM tarefas t JOIN projetos p ON (p.id = t.id_projeto) JOIN usuarios u ON (u.id = t.id_usuario);";
            $stm= $this->conn->prepare($sql);
            $stm->execute();
            $result= $stm->fetchAll();
            return $this->map($result);
        }

        public function findById(int $id) {
        $sql = "SELECT t.*, p.nome nome_projeto, u.nome nome_usuario
                FROM tarefas t
                JOIN projetos p ON (p.id = t.id_projeto)
                JOIN usuarios u ON (u.id = t.id_usuario)
                WHERE t.id = ?";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $tarefas = $this->map($result);

        if(count($tarefas) == 1)
            return $tarefas[0];

        return NULL;
        }
        private function map (array $result) {
            $tarefas = array();
            foreach($result as $r) {
                $tarefa = new Tarefa();
                $tarefa->setId($r["id"]);
                $tarefa->setTitulo($r["titulo"]);
                $tarefa->setDescricao($r["descricao"]);
                $tarefa->setstatus($r["status"]);

                $usuario = new Usuario();
                $usuario->setId($r["id_usuario"]);
                $usuario->setNome($r["nome_usuario"]);
                
                $projeto = new Projeto();
                $projeto->setId($r["id_projeto"]);
                $projeto->setNome($r["nome_projeto"]);

                $tarefa->setProjeto($projeto);
                $tarefa->setUsuario($usuario);

                array_push($tarefas, $tarefa);
            }
            return $tarefas;
        }
        public function insert(Tarefa $tarefa){
            try{
                $sql= "INSERT INTO tarefas (titulo, descricao, status, id_projeto, id_usuario) VALUES (?, ?, ?, ?, ?);";

                $stm= $this->conn->prepare($sql);
                $stm->execute(array($tarefa->getTitulo(),
                                    $tarefa->getDescricao(),
                                    $tarefa->getStatus(),
                                    $tarefa->getProjeto()->getId(),
                                    $tarefa->getUsuario()->getId()
                                ));
        }catch(PDOException $e){
            die("Erro ao inserir Tarefa: ".$e->getMessage());
        }
    }
    public function delete(int $id){
        try{
            $sql= "DELETE FROM tarefas WHERE id = ?;";
            $stm= $this->conn->prepare($sql);
            $stm->execute(array($id));
        }catch(PDOException $e){
            die("Erro ao deletar tarefa: ".$e->getMessage());
        }

    }
    public function update(Tarefa $tarefa) {
        try {
            $sql = "UPDATE tarefas 
                    SET titulo = ?, descricao = ?, 
                        status = ?, id_projeto = ?, id_usuario = ? 
                    WHERE id = ?";
            $stm = $this->conn->prepare($sql);
            $stm->execute(array($tarefa->getTitulo(), 
                                $tarefa->getdescricao(),
                                $tarefa->getStatus(), 
                                $tarefa->getProjeto()->getId(),
                                $tarefa->getUsuario()->getId(),
                                $tarefa->getId()));
        } catch(PDOException $e) {
            die($e->getMessage());
        }                   
    }
    

}

?>