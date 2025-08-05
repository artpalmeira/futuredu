<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="nota_curso">
  <?php require_once('template/topo-logo.php') ?>

  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=notas';" tabindex="0" data-tts="Voltar">⮨</button>
    <h1>Notas do Curso</h1>
  </div>

  <div class="course-header" tabindex="0" data-tts="DEVWEB01 - Desenvolvimento Web">
    <h2>Desenvolvimento Web - DEVWEB01</h2>
    <p>Modalidade: Presencial | Carga Horária: 200h</p>
  </div>

  <div class="notes-container">
    <div class="note-card" onclick="this.classList.toggle('open')" tabindex="0" data-tts="Prova 1">
      <h3>Prova 1</h3>
      <div class="nota-resumo" tabindex="0" data-tts="Nota 8,5"><strong>Nota:</strong> 8.5</div>
      <div class="note-extra">
        <p><strong>Data:</strong> 15/04/2025</p>
        <p><strong>Observação:</strong> Boa estrutura de código, use mais comentários.</p>
      </div>
    </div>

    <div class="note-card" onclick="this.classList.toggle('open')" tabindex="0" data-tts="Trabalho Prático">
      <h3>Trabalho Prático</h3>
      <div class="nota-resumo" tabindex="0" data-tts="Nota 9,0"><strong>Nota:</strong> 9.0</div>
      <div class="note-extra">
        <p><strong>Data:</strong> 02/05/2025</p>
        <p><strong>Observação:</strong> Ótimo projeto, bem documentado.</p>
      </div>
    </div>
  </div>

  <?php require_once('template/menu-inferior.php') ?>

  <script src="assets/js/script.js"></script>
</body>

</html>