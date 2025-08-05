<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="cadastrar">
  <?php require_once('template/topo-logo.php') ?>

  <div class="top-bar">
    <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=index';" data-tts="Voltar">⮨</button>
    <h1>Cadastre-se</h1>
  </div>

  <div class="form-container">
    <form method="POST" action="<?= URL_BASE; ?>index.php?url=index">
      <div class="form-group">
        <label for="nome_completo">Nome Completo</label>
        <input type="text" id="nome_completo" placeholder="nome_completo" data-tts="Nome Completo" value="" required>
      </div>
      <div class="form-group">
        <label for="nome_social">Nome Social</label>
        <input type="text" id="nome_social" name="nome_social" value="" data-tts="Nome Social">
      </div>
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" data-tts="CPF" value="" required>
      </div>
      <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" id="rg" name="rg" placeholder="00.000.000-X" data-tts="RG" value="" required>
      </div>
      <div class="form-group">
        <label for="data_nasc">Data Nascimento</label>
        <input type="date" id="data_nasc" name="data_nasc" data-tts="Data de Nascimento" value="" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="seu_email@email.com" data-tts="E-Mail" value="" required>
      </div>
      <div class="form-group">
        <label for="senha">Nova Senha</label>
        <input type="password" id="senha" name="senha" placeholder="******" data-tts="Senha" value="" required>
      </div>
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" placeholder="(11) 99999-9999" data-tts="Telefone" value="" required>
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="tel" id="celular" name="celular" placeholder="(11) 99999-9999" data-tts="Celular" value="" required>
      </div>
      <div class="form-group-flex">
        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" id="cep" name="cep" placeholder="00000-000" data-tts="CEP" value="" required>
        </div>
        <div class="form-group">
          <label for="numero">Número</label>
          <input type="text" id="numero" name="numero" placeholder="0000" data-tts="Número" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label for="endereco">Endereço</label>
        <textarea id="endereco" name="endereco" rows="3" placeholder="Rua A - Centro, São Paulo/SP" data-tts="Endereço completo" required></textarea>
      </div>

      <div class="form-group">
        <label for="complemento">Complemento</label>
        <textarea id="complemento" name="complemento" rows="3" placeholder="Próximo ao ...." data-tts="Complemento"></textarea>
      </div>
      <!-- RESPONSÁVEL -->
      <div class="form-group">
        <label for="responsavel">Nome Responsável</label>
        <input type="text" id="responsavel" name="responsavel" data-tts="Nome do responsável" value="">
      </div>
      <div class="form-group">
        <label for="telefone_responsavel">Telefone</label>
        <input type="tel" id="telefone_responsavel" name="telefone_responsavel" placeholder="(11) 99999-9999" data-tts="Telefone do responsável" value="">
      </div>
      <div class="form-group">
        <label for="email_responsavel">E-mail</label>
        <input type="email" id="email_responsavel" name="email_responsavel" placeholder="email_responsavel@email.com" data-tts="E-Mail do responsável" value="">
      </div>

      <button type="submit" class="btn-salvar" data-tts="Cadastrar">Cadastrar</button>
    </form>
  </div>

  <script src="assets/js/script.js"></script>

</body>

</html>