<?php
    include_once(__DIR__."/../../controller/ProjetoController.php");
    include_once(__DIR__."/../../controller/UsuarioController.php");
    //Carregar a lista de projetos e usuarios
    $projetoCont = new ProjetoController();
    $projetos = $projetoCont->listar();
    $usuarioCont = new UsuarioController();
    $usuarios = $usuarioCont->listar();


    include_once(__DIR__."/../include/header.php");


?>
<h3>Inserir Tarefa</h3>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $tarefa ? $tarefa->getId() : '' ?>">
    <div>
        <label for="txtNome">Titulo:</label>
        <input type="text" id="txtTitulo" name="titulo"
            placeholder="Informe o titulo"
            value="<?= $tarefa ? $tarefa->getTitulo() : ''?>">
    </div>

    <div>
        <label for="txtDescricao">Descrição:</label>
        <input type="text" id="txtDescricao" name="descricao"
            placeholder="Informe a descrição"
            value="<?= $tarefa ? $tarefa->getDescricao() : ''?>">
    </div>

    <div>
        <label for="selStatus">Status:</label>
        <select name="status" id="selStatus">
            <option value="">----Selecione----</option>
            <option value="C" <?= $tarefa && $tarefa->getStatus() == 'C' ? 'selected' :'' ?>>Concluido</option>
            <option value="P" <?= $tarefa && $tarefa->getStatus() == 'P' ? 'selected' :'' ?>>Pendente</option>
            <option value="A" <?= $tarefa && $tarefa->getStatus() == 'A' ? 'selected' :'' ?>>Em andamento</option>            
        </select>
    </div>

    <div>
        <label for="selProjeto">Projeto:</label>
        <select name="projeto" id="selProjeto">
            <option value="">----Selecione----</option>
            <?php foreach($projetos as $p): ?>
                <option value="<?= $p->getId();?>"
                    <?php if($tarefa && $tarefa->getProjeto() && $tarefa->getProjeto()->getId() == $p->getId()) echo "selected";
                    ?>
                >
                    <?= $p->getNome(); ?>
                </option>

            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="selUsuario">Usuario:</label>
        <select name="usuario" id="selUsuario">
            <option value="">----Selecione----</option>
            <?php foreach($usuarios as $u): ?>
                <option value="<?= $u->getId();?>"
                    <?php if($tarefa && $tarefa->getUsuario() && $tarefa->getUsuario()->getId() == $u->getId()) echo "selected";
                    ?>
                >
                    <?= $u->getNome(); ?>
                </option>

            <?php endforeach; ?>
        </select>
    </div>

    <div class="mt-2">
        <button type="submit" 
            class="btn btn-success">Gravar</button>
    </div>

</form>
<div style="color: red;">
    <?= $msgErro ?>
</div>

<div>
    <a href="listar.php">Voltar</a>
</div>
<?php
include_once(__DIR__."/../include/footer.php");
?>