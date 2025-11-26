<?php
class TarefaService{

    public function validar(Tarefa $tarefa){
        $erros = array();
        if(! $tarefa->getTitulo())
            array_push($erros, "Informe o titulo!");
        if(! $tarefa->getStatus() || ($tarefa->getStatus() != "C" && $tarefa->getStatus() != "P" && $tarefa->getStatus() != "A"))
            array_push($erros, "Informe o status da tarefa!");
        if(! $tarefa->getProjeto() || ! $tarefa->getProjeto()->getId())
            array_push($erros, "Informe o projeto!");
        if(! $tarefa->getUsuario() || ! $tarefa->getUsuario()->getId())
            array_push($erros, "Informe o Usuário!");


        return $erros;

    }
}



?>