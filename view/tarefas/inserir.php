<?php
$msgErro = "";
$tarefa= NULL;
if(isset($_POST['titulo'])){
    include_once(__DIR__."/../../model/Tarefa.php");
    include_once(__DIR__."/../../controller/TarefaController.php");
    $titulo= trim($_POST['titulo']) ? trim($_POST['titulo']) : NULL;
    $descricao= trim($_POST['descricao']) ? trim($_POST['descricao']) : NULL; 
    $status= trim($_POST['status']) ? trim($_POST['status']) : NULL;
    $idprojeto= is_numeric($_POST['projeto']) ? $_POST['projeto'] : NULL;
    $idusuario= is_numeric($_POST['usuario']) ? $_POST['usuario'] : NULL;
    $tarefa= new Tarefa();
    $tarefa->setTitulo($titulo);
    $tarefa->setDescricao($descricao);
    $tarefa->setStatus($status);
    if($idprojeto !== NULL){ 
        $projeto = new Projeto();
        $projeto->setId($idprojeto);
        $tarefa->setProjeto($projeto);
        
    } else
        $tarefa->setProjeto(NULL);
    if($idusuario !== NULL){ 
        $usuario = new Usuario();
        $usuario->setId($idusuario);
        $tarefa->setUsuario($usuario);
        
    } else
        $tarefa->setUsuario(NULL);
    
    $tarefaCont = new TarefaController();
    $erros= $tarefaCont->inserir($tarefa);
    if(! $erros)
        header("Location: listar.php");
    else{
        $msgErro=implode("<br>", $erros);
    }
    
}
include_once(__DIR__."/form.php");
?>