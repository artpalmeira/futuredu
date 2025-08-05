<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="curso">
  <?php require_once('template/topo-logo.php') ?>

  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=menu';" data-tts="Voltar">⮨</button>
    <h1>Cursos Matriculados</h1>
  </div>

  <div class="courses-container">
    <a href="<?= URL_BASE; ?>index.php?url=notaCurso" class="course-card" data-tts="DEVWEB01">
      <img src="assets/img/desweb.webp" alt="Imagem do curso">
      <div class="course-info">
        <h2>DEVWEB01</h2>
        <h3>Desenvolvimento Web</h3>
        <p>Modalidade: Presencial</p>
        <p>Carga Horária: 200h</p>
      </div>
    </a>

    <a href="<?= URL_BASE; ?>index.php?url=notaCurso" class="course-card" data-tts="DESGRA01">
      <img src="assets/img/desgra.webp" alt="Imagem do curso">
      <div class="course-info">
        <h2>DESGRA01</h2>
        <h3>Design Gráfico</h3>
        <p>Modalidade: Online</p>
        <p>Carga Horária: 160h</p>
      </div>
    </a>
  </div>

  <?php require_once('template/menu-inferior.php') ?>
  <script src="assets/js/script.js"></script>
</body>

</html>