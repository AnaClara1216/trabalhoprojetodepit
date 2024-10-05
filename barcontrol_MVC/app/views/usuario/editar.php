<!-- editar.php -->
<form method="POST" action="index.php?url=usuario/salvar&id=<?= $usuario->id ?>">
    <input type="text" name="nome" value="<?= $usuario->nome ?>" required>
    <input type="text" name="usuario" value="<?= $usuario->usuario ?>" required>
    <button type="submit">Salvar</button>
</form>
