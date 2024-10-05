<!-- editar.php -->
<form method="POST" action="index.php?url=comanda/salvar&id=<?= $comanda->id ?>">
    <input type="text" name="campo1" value="<?= $comanda->campo1 ?>" required>
    <button type="submit">Salvar</button>
</form>
