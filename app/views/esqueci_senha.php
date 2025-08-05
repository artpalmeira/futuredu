<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="esqueci_senha">
  <div class="container">
    <h2>Redefinir Senha</h2>
    <p>Informe seu e-mail para enviarmos o link de redefinição.</p>

    <form id="resetForm" onsubmit="enviarEmail(event)">
      <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
      <button type="submit" data-tts="Enviar">Enviar</button>
      <p id="mensagem" class="mensagem-sucesso" style="display: none;">
        ✅ Link de redefinição de senha enviado para seu e-mail.
      </p>
    </form>

    <div class="voltar">
      <a href="<?= URL_BASE; ?>index.php?url=login" data-tts="Voltar para o login">← Voltar para o login</a>
    </div>
  </div>

<script src="assets/js/script.js"></script>
</body>

</html>
