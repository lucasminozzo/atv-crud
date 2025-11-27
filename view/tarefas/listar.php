<?php
    include_once(__DIR__."/../../controller/TarefaController.php");
    $tarefaCont = new TarefaController();
    $tarefas = $tarefaCont->listar();

    include_once(__DIR__."/../include/header.php");    
?>

<div class="container">
    <h3>Listagem de Tarefas</h3> 
    
    <div style="margin-bottom: 15px;">
        <a href="inserir.php" class="btn">Nova Tarefa +</a>
    </div>


<table>
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Descricao</th>
        <th>status</th>
        <th>Projeto</th>
        <th>Usuario</th>
        <th id="ed">Editar</th>
        <th id="rm">Remover</th>
    </tr>

    <!-- Dados -->
   <?php foreach($tarefas as $t): ?>
    <tr>
        <td><?php echo $t->getId(); ?></td>
        <td><?php echo $t->getTitulo(); ?></td>
        <td><?php echo $t->getDescricao(); ?></td>
        <td><?php echo $t->getStatusDesc(); ?></td>
        <td><?php echo $t->getProjeto()->getId(). "-" . $t->getProjeto()->getNome()?></td>
        <td><?php echo $t->getUsuario()->getId(). "-" . $t->getUsuario()->getNome()?></td>
        <td id="ed">
            <a href="editar.php?id=<?php echo $t->getId(); ?>">
                <img src="../../img/btn_editar.png" alt="Editar">
            </a>
        </td>
        <td id="rm">
            <a href="excluir.php?id=<?php echo $t->getId(); ?>">
                <img src="../../img/btn_excluir.png" alt="Excluir">
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
</div>
<?php
include_once(__DIR__."/../include/footer.php");
?>