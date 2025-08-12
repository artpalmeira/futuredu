<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="notas">
  <?php require_once('template/topo-logo.php') ?>

  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=menu';" tabindex="0" data-tts="Voltar">⮨</button>
    <h1>Minhas Notas</h1>
  </div>

  <div class="notes-container">
    <a href="<?= URL_BASE; ?>index.php?url=notaCurso" class="note-card-link" tabindex="0" data-tts="Desenvolvimento Web">
      <div class="note-card">
        <h2>Desenvolvimento Web</h2>
        <p tabindex="0" data-tts="Média 8,5"><strong>Média:</strong> 8.5</p>
        <p><strong>Data:</strong> 15/04/2025</p>
        <p><strong>Observação:</strong> Boa lógica, pode melhorar a identação.</p>
      </div>
    </a>

    <a href="<?= URL_BASE; ?>index.php?url=notaCurso" class="note-card-link" tabindex="0" data-tts="Design Gráfico">
      <div class="note-card">
        <h2>Design Gráfico</h2>
        <p tabindex="0" data-tts="Média 9,2"><strong>Média:</strong> 9.2</p>
        <p><strong>Data:</strong> 10/06/2025</p>
        <p><strong>Observação:</strong> Excelente apresentação visual.</p>
      </div>
    </a>
  </div>

  <?php require_once('template/menu-inferior.php') ?>

  <script src="assets/js/script.js"></script>
</body>

</html>