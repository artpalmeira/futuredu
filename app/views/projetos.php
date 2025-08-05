<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="projetos">
  <?php require_once('template/topo-logo.php') ?>
  
  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=menu';" tabindex="0" data-tts="Voltar">⮨</button>
    <h1>Meus Projetos</h1>
  </div>

  <div class="projects-container">
    <div class="project-card" tabindex="0" data-tts="Sistema de Biblioteca">
      <h2>Sistema de Biblioteca</h2>
      <p><strong>Professor:</strong> Ana Costa</p>
      <p><strong>Status:</strong> Concluído</p>
      <p tabindex="0" data-tts="Nota: 9,5"><strong>Nota:</strong> 9.5</p>
      <p><strong>Período:</strong> Jan - Mar/2025</p>
      <a href="https://exemplo.com/projetos/biblioteca" target="_blank"  tabindex="0" data-tts="Acesse o link">🔗 Acessar Projeto</a>
    </div>

    <div class="project-card" tabindex="0" data-tts="Aplicativo de Tarefas">
      <h2>Aplicativo de Tarefas</h2>
      <p><strong>Professor:</strong> Carlos Lima</p>
      <p><strong>Status:</strong> Em andamento</p>
      <p tabindex="0" data-tts="Nota: -"><strong>Nota:</strong> -</p>
      <p><strong>Período:</strong> Abr - Jun/2025</p>
      <a href="#"  tabindex="0" data-tts="Link ainda não disponível">🔗 Link ainda não disponível</a>
    </div>
  </div>

  <?php require_once('template/menu-inferior.php') ?>

  <script src="assets/js/script.js"></script>
</body>

</html>