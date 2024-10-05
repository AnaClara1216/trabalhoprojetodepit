<!-- login.php -->
<form method="POST" action="index.php?url=login/authenticate">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
<?php if (isset($erro)) echo "<p>$erro</p>"; ?>
