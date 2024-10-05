<!-- listar.php -->
<h2>Listar Itens do Cardápio</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($itens as $item): ?>
    <tr>
        <td><?= $item->id ?></td>
        <td><?= $item->nome ?></td>
        <td><?= $item->preco ?></td>
        <td>
            <a href="index.php?url=cardapio/editar&id=<?= $item->id ?>">Editar</a>
            <a href="index.php?url=cardapio/excluir&id=<?= $item->id ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
