<header class="topo">
    <div class="topo-info">
        <div class="site">
            <div class="topo-area">
                <ul class="info">
                    <li>
                        <i class="icofont-ui-call"></i> <span>+55 11 91234-5678</span>
                    </li>
                    <li>
                        <i class="icofont-location-pin"></i> Av. Paulista, 1000 - São
                        Paulo, SP, Brasil
                    </li>
                </ul>

                <ul class="social-icons">
                    <li>
                        <p>Encontre-nos em:</p>
                    </li>
                    <li>
                        <a href="#" class="fb"><i class="icofont-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="topo-menu">
        <div class="site">
            <div class="topo-bloco">
                <div class="logo">
                    <a href="#"><img src="<?= URL_BASE; ?>assets/img/logo-futuedu-branco.svg" alt="FuturEdu"></a>
                </div>
                <div class="area-menu">
                    <div class="menu">
                        <ul>
                            <li><a href="<?= URL_BASE ?>home">Início</a></li>
                            <li class="sub-menu">
                                <a href="<?= URL_BASE ?>curso">Cursos</a>
                                <ul class="lab-ul">
                                    <li><a href="#">Front-End</a></li>
                                    <li><a href="#">Back-End</a></li>
                                    <li><a href="#">Data Science</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="<?= URL_BASE ?>sobre">Sobre</a>
                                <ul class="lab-ul">
                                    <li>
                                        <a href="<?= URL_BASE ?>unidade">Unidade</a>
                                    </li>

                                    <li><a href="<?= URL_BASE ?>instrutores">Instrutores</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= URL_BASE ?>contato">Contato</a></li>
                        </ul>
                    </div>

                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalLogin" class="login">
                        <i class="icofont-user"></i>
                        <span>ENTRAR</span>
                    </a>
                    <a href="#" class="cadastro"><i class="icofont-users"></i> <span>CADASTRAR-SE</span>
                    </a>

                    <!-- Ícones do menu responsivo -->
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="ellepsis-bar d-lg-none">
                        <i class="icofont-info-square"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Modal Login -->
<div class="modal fade modalLogin" id="modalLogin" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login - FuturEdu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Corpo do modal com o formulário -->
                <form method="POST" action="login/entrar">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha" class="form-control" required>
                        </div>
                    </div>
                    <!-- Rodapé do modal com os botões -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>