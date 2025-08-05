<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="login">
  <div class="login-container">
    <div class="logo">
      <img src="assets/img/logo-futuedu-preto.svg" alt="Logo Futuedu" />
    </div>
    <h2>Login do Aluno</h2>
    <form method="POST" action="<?= URL_BASE; ?>index.php?url=login/logar">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email_aluno" data-tts="E-mail" required />
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha_aluno" data-tts="Senha" required />
      </div>
      <button type="submit" class="btn-login" data-tts="Entrar">Entrar</button>
    </form>
    <div class="bottom-link">
      <a href="<?= URL_BASE; ?>index.php?url=esqueciSenha" data-tts="Esqueceu a senha?">Esqueceu a senha?</a>
    </div>
    <div class="bottom-link">
      Não tem cadastro? 
      <a href="<?= URL_BASE; ?>index.php?url=cadastrarAluno" data-tts="Cadastre-se">Cadastre-se</a>
    </div>
  </div>

  <script src="assets/js/script.js"></script>
</body>

</html>
