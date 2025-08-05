<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="mensagem">
    <?php require_once('template/topo-logo.php') ?>
    
    <div class="top-bar">
        <button class="back-btn" onclick="window.location.href='<?= URL_BASE; ?>index.php?url=menu';" tabindex="0" data-tts="Voltar">⮨</button>
        <h1>Contato com a Coordenação</h1>
    </div>

    <div class="contact-container">
        <div class="contact-info" tabindex="0" data-tts="Dados da Coordenação">
            <h2>Formas de contato</h2>
            <p tabindex="0" data-tts="coordenacao@futuredu.com.br"><strong>E-mail:</strong> coordenacao@futuredu.com.br</p>
            <p tabindex="0" data-tts="1140028922"><strong>Telefone:</strong> (11) 4002-8922</p>
            <p tabindex="0" data-tts="11988887766"><strong>WhatsApp:</strong> (11) 98888-7766</p>
            <p tabindex="0" data-tts="De segunda à sexta das 8h às 17h"><strong>Horário Atend:</strong> Seg a Sex, 08h às 17h</p>
        </div>

        <form method="POST" action="<?= URL_BASE; ?>index.php?url=menu">
            <div class="form-group">
                <label for="assunto">Assunto</label>
                <input type="text" id="assunto" name="assunto" placeholder="Assunto da mensagem" data-tts="Assunto da mensagem" required>
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="5" placeholder="Digite sua mensagem aqui..." data-tts="Digite sua mensagem" required></textarea>
            </div>
            <button type="submit" data-tts="Enviar Mensagem">Enviar Mensagem</button>
        </form>
    </div>

    <?php require_once('template/menu-inferior.php') ?>

    <script src="assets/js/script.js"></script>
</body>

</html>