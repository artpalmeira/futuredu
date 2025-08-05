<?php
if (!isset($_SESSION['aluno'])) {
    header("Location: " . URL_BASE . "login");
    exit;
}

$aluno = $_SESSION['aluno'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require_once('template/head.php') ?>

<body id="menu">
    <?php require_once('template/topo-logo.php') ?>

    <div class="home-container">

        <div class="welcome" tabindex="0" data-tts="Olá, José! O que deseja fazer hoje?">
            Olá, <?= $aluno['nome_aluno']; ?>!<br><span>O que você deseja fazer hoje?</span>
        </div>

        <div class="section-title">Acesso Rápido</div>

        <a class="card-link" href="<?= URL_BASE; ?>index.php?url=curso" data-tts="Meus Cursos">
            <span>📚 Meus Cursos</span>
        </a>
        <a class="card-link" href="<?= URL_BASE; ?>index.php?url=notas" data-tts="Minhas Notas">
            <span>📝 Minhas Notas</span>
        </a>
        <a class="card-link" href="<?= URL_BASE; ?>index.php?url=projetos" data-tts="Meus Projetos">
            <span>📁 Meus Projetos</span>
        </a>
        <a class="card-link" href="<?= URL_BASE; ?>index.php?url=mensagem" data-tts="Enviar Mensagem">
            <span>📨 Enviar Mensagem</span>
        </a>
        <a class="card-link" href="<?= URL_BASE; ?>index.php?url=configuracao" data-tts="Configurações">
            <span>⚙️ Configurações</span>
        </a>
    </div>

    <?php require_once('template/menu-inferior.php') ?>

    <script src="assets/js/script.js"></script>
</body>

</html>