<?php
$current = $_GET['url'] ?? 'menu';
//$current = basename($_SERVER['PHP_SELF']);
?>

<div class="bottom-menu">
    <a href="<?= URL_BASE; ?>index.php?url=menu" class="<?= $current == 'menu' ? 'ativo' : '' ?>" data-tts="Home">🏠<br>Home</a>
    <a href="<?= URL_BASE; ?>index.php?url=curso" class="<?= $current == 'curso' ? 'ativo' : '' ?>" data-tts="Cursos">📚<br>Cursos</a>
    <a href="<?= URL_BASE; ?>index.php?url=perfil" class="<?= ($current == 'perfil' || $current == 'atualizarPerfil') ? 'ativo' : '' ?>" data-tts="Perfil">👤<br>Perfil</a>
</div>

