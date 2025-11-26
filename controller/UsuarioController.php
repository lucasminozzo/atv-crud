<?php
    include_once(__DIR__."/../dao/UsuarioDao.php");

    class UsuarioController {

        private UsuarioDao $usuarioDao;
        public function __construct(){
            $this->usuarioDao = new UsuarioDao();
        }
        public function listar(){
            $usuarioDao = new UsuarioDao();
           return $usuarioDao->list();

        }

    }

?>