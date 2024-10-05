<!-- listar.php -->
<h2>Listar Usuários</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Usuário</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario->id ?></td>
        <td><?= $usuario->nome ?></td>
        <td><?= $usuario->usuario ?></td>
        <td>
            <a href="index.php?url=usuario/editar&id=<?= $usuario->id ?>">Editar</a>
            <a href="index.php?url=usuario/excluir&id=<?= $usuario->id ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
