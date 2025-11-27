<?php
    include_once(__DIR__."/../../controller/ProjetoController.php");
    include_once(__DIR__."/../../controller/UsuarioController.php");
    
    $projetoCont = new ProjetoController();
    $projetos = $projetoCont->listar();
    $usuarioCont = new UsuarioController();
    $usuarios = $usuarioCont->listar();

    include_once(__DIR__."/../include/header.php");
?>

<div class="container">
    <h3><?= $tarefa && $tarefa->getId() ? 'Editar Tarefa' : 'Nova Tarefa' ?></h3>

    <form method="POST" action="">
        
        <input type="hidden" name="id" value="<?= $tarefa ? $tarefa->getId() : '' ?>">

        <div class="form-group">
            <label for="txtTitulo">Título:</label>
            <input type="text" id="txtTitulo" name="titulo" 
                placeholder="Ex: Corrigir bug no login"
                required
                value="<?= $tarefa ? $tarefa->getTitulo() : ''?>">
        </div>

        <div class="form-group">
            <label for="txtDescricao">Descrição:</label>
            <input type="text" id="txtDescricao" name="descricao" 
                placeholder="Detalhes da tarefa..."
                value="<?= $tarefa ? $tarefa->getDescricao() : ''?>">
        </div>

        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            
            <div class="form-group" style="flex: 1; min-width: 150px;">
                <label for="selStatus">Status:</label>
                <select name="status" id="selStatus">
                    <option value="">-- Selecione --</option>
                    <option value="C" <?= $tarefa && $tarefa->getStatus() == 'C' ? 'selected' :'' ?>>Concluído</option>
                    <option value="P" <?= $tarefa && $tarefa->getStatus() == 'P' ? 'selected' :'' ?>>Pendente</option>
                    <option value="A" <?= $tarefa && $tarefa->getStatus() == 'A' ? 'selected' :'' ?>>Em andamento</option>            
                </select>
            </div>

            <div class="form-group" style="flex: 1; min-width: 150px;">
                <label for="selProjeto">Projeto:</label>
                <select name="projeto" id="selProjeto">
                    <option value="">-- Selecione --</option>
                    <?php foreach($projetos as $p): ?>
                        <option value="<?= $p->getId();?>"
                            <?php if($tarefa && $tarefa->getProjeto() && $tarefa->getProjeto()->getId() == $p->getId()) echo "selected"; ?>
                        >
                            <?= $p->getNome(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group" style="flex: 1; min-width: 150px;">
                <label for="selUsuario">Usuário:</label>
                <select name="usuario" id="selUsuario">
                    <option value="">-- Selecione --</option>
                    <?php foreach($usuarios as $u): ?>
                        <option value="<?= $u->getId();?>"
                            <?php if($tarefa && $tarefa->getUsuario() && $tarefa->getUsuario()->getId() == $u->getId()) echo "selected"; ?>
                        >
                            <?= $u->getNome(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn">Gravar</button>
            <a href="listar.php" class="btn btn-voltar">Voltar</a>
        </div>
    </form>

    <div style="color: #dc3545; margin-top: 10px;">
        <?= $msgErro ?>
    </div>
</div>

<?php
include_once(__DIR__."/../include/footer.php");
?>