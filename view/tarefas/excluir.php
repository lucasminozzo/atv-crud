<?php
    include_once(__DIR__."/../../controller/TarefaController.php");
    $id=0;
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $tarefaCont = new TarefaController();
        $tarefaCont->deletar($id);
    }
    header("Location: listar.php");
?>