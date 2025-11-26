<?php
    include_once(__DIR__."/../dao/TarefaDao.php");
    include_once(__DIR__."/../service/TarefaService.php");
    class TarefaController {
        private TarefaService $tarefaService;
        private TarefaDao $tarefaDao;

        public function __construct(){
            $this->tarefaDao = new TarefaDao();
            $this->tarefaService = new TarefaService();
        }
        public function listar():array{
            return $this->tarefaDao->list();
        }
        public function buscarPorId(int $id) {
        return $this->tarefaDao->findById($id);
        }

        public function inserir(Tarefa $tarefa){
            $erros=$this->tarefaService->validar($tarefa);
            if(!$erros)
                $this->tarefaDao->insert($tarefa);
            return $erros;
        }
        
        public function editar(Tarefa $tarefa) {
        //Validar os dados
        $erros = $this->tarefaService->validar($tarefa);
        
        if(! $erros)
            $this->tarefaDao->update($tarefa);

        return $erros;
    }


        public function deletar(int $id){
            $this->tarefaDao->delete($id);
        }


    }


?>