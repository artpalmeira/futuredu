<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="configuracao">
  <?php require_once('template/topo-logo.php') ?>
  
  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=menu';" data-tts="Voltar">⮨</button>
    <h1>Configurações</h1>
  </div>

  <div class="settings-container">
    <div class="settings-list">
      <a href="<?= URL_BASE; ?>index.php?url=atualizarPerfil" data-tts="Atualização de Dados Pessoais">👤 Atualização de Dados Pessoais</a>
      <a href="<?= URL_BASE; ?>index.php?url=notificacao" data-tts="Notificações e Comunicados">🔔 Notificações e Comunicados</a>
      <a href="<?= URL_BASE; ?>index.php?url=login" data-tts="Sair">🚪 Sair</a>
    </div>
  </div>

  <?php require_once('template/menu-inferior.php') ?>
  <script src="assets/js/script.js"></script>
</body>

</html>