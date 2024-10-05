<!-- editar.php -->
<form method="POST" action="index.php?url=cardapio/salvar&id=<?= $item->id ?>">
    <input type="text" name="nome" value="<?= $item->nome ?>" required>
    <input type="text" name="preco" value="<?= $item->preco ?>" required>
    <button type="submit">Salvar</button>
</form>
