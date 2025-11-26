<?php

    include_once(__DIR__."/Projeto.php");
    include_once(__DIR__."/Usuario.php");

    class Tarefa {
        private ?int $id;
        private ?string $titulo;
        private ?string $descricao;
        private ?string $status;
        private ?Projeto $projeto;
        private ?Usuario $usuario;
    
    public function getStatusDesc(){
        if($this->status == "C"){
            return "Concluido";
        } else if($this->status == "P"){
            return "Pendente";
        }else if($this->status == "A"){
            return "Em Andamento";
        }else
            return "";
    }


    public function getId(): ?int {
        return $this->id;
    
    }
    public function setId(?int $id): void {
        $this->id = $id;
    }
    public function getTitulo(): ?string {
        return $this->titulo;
    }
    public function setTitulo(?string $titulo): void {
        $this->titulo = $titulo;
    }
    public function getDescricao(): ?string {
        return $this->descricao;
    }
    public function setDescricao(?string $descricao): void {
        $this->descricao = $descricao;
    }
    public function getStatus(): ?string {
        return $this->status;
    }
    public function setstatus(?string $status): void {
        $this->status = $status;
    }
    public function getProjeto(): ?Projeto {
        return $this->projeto;
    }
    public function setProjeto(?Projeto $projeto): void {
        $this->projeto = $projeto;
    }
    public function getUsuario(): ?Usuario {
        return $this->usuario;
    }
    public function setUsuario(?Usuario $usuario): void {
        $this->usuario = $usuario;
    }
}

?>