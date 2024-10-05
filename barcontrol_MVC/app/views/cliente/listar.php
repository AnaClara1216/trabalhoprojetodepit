<!-- listar.php -->
<h2>Listar Clientes</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($clientes as $cliente): ?>
    <tr>
        <td><?= $cliente->id ?></td>
        <td><?= $cliente->nome ?></td>
        <td>
            <a href="index.php?url=cliente/editar&id=<?= $cliente->id ?>">Editar</a>
            <a href="index.php?url=cliente/excluir&id=<?= $cliente->id ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
