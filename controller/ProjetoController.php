<?php
    include_once(__DIR__."/../dao/ProjetoDao.php");

    class ProjetoController {

        private ProjetoDao $projetoDao;
        public function __construct(){
            $this->projetoDao = new ProjetoDao();
        }
        public function listar(){
            $projetoDao = new ProjetoDao();
           return $projetoDao->list();

        }

    }

?>