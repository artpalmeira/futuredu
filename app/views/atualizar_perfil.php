<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="atualizarPerfil">
  <?php require_once('template/topo-logo.php') ?>
  
  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=perfil';">⮨</button>
    <h1>Atualizar Dados</h1>
  </div>

  <div class="form-container">
    <form method="POST" action="<?= URL_BASE; ?>index.php?url=menu">
      <div class="form-group">
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" value="José da Silva" data-tts="Nome" required>
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="jose@email.com" data-tts="E-Mail" required>
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" value="(11) 91234-5678" data-tts="Telefone">
      </div>

      <div class="form-group">
        <label for="endereco">Endereço</label>
        <textarea id="endereco" name="endereco" rows="3" data-tts="Endereço">Rua A, nº 100 - Centro, São Paulo/SP</textarea>
      </div>

      <div class="form-group">
        <label for="senha">Nova Senha</label>
        <input type="password" id="senha" name="senha" data-tts="Senha">
      </div>

      <button type="submit" class="btn-salvar" data-tts="Salvar Alterações">Salvar Alterações</button>
    </form>
  </div>

  <?php require_once('template/menu-inferior.php') ?>
  <script src="assets/js/script.js"></script>
</body>

</html>