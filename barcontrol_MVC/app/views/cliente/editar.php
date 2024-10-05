<!-- editar.php -->
<form method="POST" action="index.php?url=cliente/salvar&id=<?= $cliente->id ?>">
    <input type="text" name="nome" value="<?= $cliente->nome ?>" required>
    <button type="submit">Salvar</button>
</form>
