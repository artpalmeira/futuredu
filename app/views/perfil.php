<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="perfil">
  <?php require_once('template/topo-logo.php') ?>
  
  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=menu';" tabindex="0" data-tts="Voltar">⮨</button>
    <h1>Perfil do Aluno</h1>
  </div>

  <div class="profile-container">
    <div class="profile-pic">
      <img src="assets/img/house.jpg" alt="Foto do Aluno" tabindex="0" data-tts="Foto">
    </div>

    <div class="info-group" tabindex="0" data-tts="Nome: José da Silva">
      <label>Nome:</label>
      <span>José da Silva</span>
    </div>

    <div class="info-group" tabindex="0" data-tts="E-mail: jose@email.com">
      <label>E-mail:</label>
      <span>jose@email.com</span>
    </div>

    <div class="info-group" tabindex="0" data-tts="Telefone: 11912345678">
      <label>Telefone:</label>
      <span>(11) 91234-5678</span>
    </div>

    <div class="info-group" tabindex="0" data-tts="Data de Nascimento: 10/05/2000">
      <label>Data de Nascimento:</label>
      <span>10/05/2000</span>
    </div>

    <div class="info-group" tabindex="0" data-tts="Endereço: Rua A, nº 100 - Centro, São Paulo/SP">
      <label>Endereço:</label>
      <span>Rua A, nº 100 - Centro, São Paulo/SP</span>
    </div>

    <div class="info-group" tabindex="0" data-tts="Responsável: Maria da Silva - 11933334444">
      <label>Responsável:</label>
      <span>Maria da Silva - (11) 93333-4444</span>
    </div>

    <!-- Botão para atualizar dados -->
    <div class="btn-atualizar">
      <a href="<?= URL_BASE; ?>index.php?url=atualizarPerfil" class="btn-update" tabindex="0" data-tts="Atualizar Dados">Atualizar Dados</a>
    </div>

  </div>

  <?php require_once('template/menu-inferior.php') ?>

  <script src="assets/js/script.js"></script>
</body>

</html>