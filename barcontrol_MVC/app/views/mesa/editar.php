<!-- editar.php -->
<form method="POST" action="index.php?url=mesa/salvar&id=<?= $mesa->id ?>">
    <input type="text" name="numero" value="<?= $mesa->numero ?>" required>
    <button type="submit">Salvar</button>
</form>
