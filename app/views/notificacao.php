<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="notificacao">
    <?php require_once('template/topo-logo.php') ?>
    
    <div class="top-bar">
        <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=configuracao';" tabindex="0" data-tts="Voltar">⮨</button>
        <h1>Notificações e Comunicados</h1>
    </div>

    <div class="notifications-container">
        <div class="notification">
            <h3 tabindex="0" data-tts="Nota Lançada">Nota Lançada</h3>
            <p tabindex="0" data-tts="Sua nota da Prova 2 de Desenvolvimento Web foi atualizada.">Sua nota da Prova 2 de Desenvolvimento Web foi atualizada.</p>
            <small>12/06/2025 14:00</small>
        </div>

        <div class="notification">
            <h3 tabindex="0" data-tts="Evento: Feira de Tecnologia">Evento: Feira de Tecnologia</h3>
            <p tabindex="0" data-tts="Participe da feira de tecnologia no dia 20/06 no campus principal.">Participe da feira de tecnologia no dia 20/06 no campus principal.</p>
            <small>10/06/2025 09:30</small>
        </div>

        <div class="notification">
            <h3 tabindex="0" data-tts="Atualização de Dados">Atualização de Dados</h3>
            <p tabindex="0" data-tts="Verifique e atualize seus dados pessoais no menu de configurações.">Verifique e atualize seus dados pessoais no menu de configurações.</p>
            <small>05/06/2025 16:45</small>
        </div>
    </div>

    <?php require_once('template/menu-inferior.php') ?>

    <script src="assets/js/script.js"></script>
</body>

</html>