<!-- listar.php -->
<h2>Listar Relatórios</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($relatorios as $relatorio): ?>
    <tr>
        <td><?= $relatorio->id ?></td>
        <td><?= $relatorio->descricao ?></td>
        <td>
            <!-- Ações para relatório -->
        </td>
    </tr>
    <?php endforeach; ?>
</table>
