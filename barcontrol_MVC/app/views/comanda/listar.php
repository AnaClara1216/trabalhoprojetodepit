<!-- listar.php -->
<h2>Listar Comandas</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Campo 1</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($comandas as $comanda): ?>
    <tr>
        <td><?= $comanda->id ?></td>
        <td><?= $comanda->campo1 ?></td>
        <td>
            <a href="index.php?url=comanda/editar&id=<?= $comanda->id ?>">Editar</a>
            <a href="index.php?url=comanda/excluir&id=<?= $comanda->id ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
