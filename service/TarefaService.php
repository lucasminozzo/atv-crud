<?php
include_once(__DIR__."/../dao/TarefaDao.php");
class TarefaService{
    public function validar(Tarefa $tarefa){
        $tarefaDao = new TarefaDao();
        $erros = array();
        if(! $tarefa->getTitulo())
            array_push($erros, "Informe o titulo!");
        else if($tarefa->getId() == 0) {
            $tarefaExistente = $tarefaDao->findByTitulo($tarefa->getTitulo());
            if($tarefaExistente) {
                array_push($erros, "Já existe uma tarefa com este título!");
        }

        if(! $tarefa->getStatus() || ($tarefa->getStatus() != "C" && $tarefa->getStatus() != "P" && $tarefa->getStatus() != "A"))
            array_push($erros, "Informe o status da tarefa!");
        if(! $tarefa->getProjeto() || ! $tarefa->getProjeto()->getId())
            array_push($erros, "Informe o projeto!");
        if(! $tarefa->getUsuario() || ! $tarefa->getUsuario()->getId())
            array_push($erros, "Informe o Usuário!");


        return $erros;

        }
    }
}

// chamar dao passar titulo testar se tem no banco

?>