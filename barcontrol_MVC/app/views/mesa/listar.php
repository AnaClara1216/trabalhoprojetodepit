<!-- listar.php -->
<h2>Listar Mesas</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($mesas as $mesa): ?>
    <tr>
        <td><?= $mesa->id ?></td>
        <td><?= $mesa->numero ?></td>
        <td>
            <a href="index.php?url=mesa/editar&id=<?= $mesa->id ?>">Editar</a>
            <a href="index.php?url=mesa/excluir&id=<?= $mesa->id ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
