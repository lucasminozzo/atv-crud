<?php

include_once(__DIR__ . "/../../controller/TarefaController.php");

$tarefaCont = new TarefaController();

$msgErro = "";
$tarefa = NULL;

if(isset($_POST['titulo'])) {
    //Já clicou no gravar
    //Capturar os valores preechidos no formulário
    $id         = $_POST["id"];
    $titulo     = ($_POST['nome']) ? ($_POST['nome']) : NULL;
    $descricao  = ($_POST['descricao']) ? ($_POST['descricao']) : NULL; 
    $status     = trim($_POST['status']) ? trim($_POST['status']) : NULL;
    $idprojeto  = is_numeric($_POST['projeto']) ? $_POST['projeto'] : NULL;
    $idusuario  = is_numeric($_POST['usuario']) ? $_POST['usuario'] : NULL;

    // //Criar um objeto aluno
    // $aluno = new Aluno();
    // $aluno->setId($id);
    // $aluno->setNome($nome);
    // $aluno->setIdade($idade);
    // $aluno->setEstrangeiro($estrang);
    $tarefa = new Tarefa();
    $tarefa->setId($id);
    $tarefa->setTitulo($titulo);
    $tarefa->setDescricao($descricao);
    $tarefa->setStatus($status);
    if($idprojeto) {
        $projeto = new Projeto();
        $projeto->setId($idprojeto);
        $tarefa->setProjeto($projeto);
    } else 
        $tarefa->setProjeto(NULL);
    if($idusuario) {
        $usuario = new Usuario();
        $usuario->setId($idusuario);
        $tarefa->setUsuario($usuario);
    } else 
        $tarefa->setUsuario(NULL);

    $erros = $tarefaCont->editar($tarefa);

    if(! $erros)
        header("location: listar.php");
    else {
        $msgErro = implode("<br>", $erros);
    }

} else {
    //Abriu o formulário para fazer a edição dos dados
    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];

    $tarefa = $tarefaCont->buscarPorId($id);
    
    if(! $tarefa) {
        echo "Tarefa não encontrada!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");