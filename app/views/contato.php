<?php require_once('template/head.php'); ?>

<body>

    <!-- preloader Início -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader Fim -->

    <!-- scrollToTop -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop -->


    <!-- Cabeçalho - Início -->
    <?php require_once('template/header.php'); ?>
    <!-- Cabeçalho - Fim -->

    <main id="contato">

        <!-- Topo da página -->
        <div class="pageheader-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="pageheader-content text-center">
                            <h2>FuturEdu - Transforme seu Conhecimento</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="<?= URL_BASE ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contato</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topo da página fim -->

        <!-- Mapa -->
        <div class="map-address-section padding-tb section-bg">
            <div class="container">
                <div class="section-header text-center">
                    <span class="subtitle">Entre em contato conosco</span>
                    <h2 class="title">Estamos sempre ansiosos para ouvir você!</h2>
                </div>
                <div class="section-wrapper">
                    <div class="row flex-row-reverse">
                        <div class="col-xl-12 col-lg-12 col-12">
                            <div class="map-area">
                                <div class="maps">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.0254648900896!2d-46.434437023916374!3d-23.495592259180643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce63dda7be6fb9%3A0xa74e7d5a53104311!2sSenac%20S%C3%A3o%20Miguel%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1745343993732!5m2!1spt-BR!2sbr" allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mapa -->

        <!-- Contate-nos -->
        <div class="contact-section padding-tb">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="title">Preencha o formulário abaixo para que possamos conhecer melhor você e suas necessidades.</h2>
                </div>
                <div class="section-wrapper">

                    <form class="contact-form" action="contato/enviarEmail" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Informe seu nome:" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Informe seu e-mail:" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Informe seu telefone" id="fone" name="fone">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Informe o assunto da mensagem" id="assunto" name="assunto">
                        </div>
                        <div class="form-group w-100">
                            <textarea name="msg" rows="8" id="msg" placeholder="Digite sua mensagem" required></textarea>
                        </div>
                        <div class="form-group w-100 text-center">
                            <input class="lab-btn" type="submit" value="Enviar email">
                        </div>
                    </form>

                    <p class="form-message">

                        <?php

                        if (@$status == 'contato') {
                            echo $mensagem;
                        } else if (@$status == 'erro') {
                            echo $nome . ', ' . $mensagem;
                        }

                        ?>

                    </p>
                </div>
            </div>
        </div>
        <!-- Contate-nos Fim -->

    </main>

    <!-- RODAPÉ -->
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <h2>FuturEdu</h2>
                <p>Transforme seu conhecimento com a melhor plataforma de ensino.</p>
            </div>
            <div class="footer-links">
                <h2>Links Rápidos</h2>
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h2>Contato</h2>
                <p><i class="icofont-tack-pin"></i> Av. Paulista, 1000 - São Paulo, SP</p>
                <p><i class="icofont-phone"></i> +55 11 91234-5678</p>
                <p><i class="icofont-email"></i> contato@futuredu.com</p>
            </div>
            <div class="footer-social">
                <h2>Nos siga</h2>
                <a href="#"><i class="icofont-facebook"></i></a>
                <a href="#"><i class="icofont-instagram"></i></a>
                <a href="#"><i class="icofont-linkedin"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 FuturEdu. Todos os direitos reservados.</p>
            <p>Desenvolvido por Alessandro Palmeira</p>
        </div>
    </footer>


    <script src="<?= URL_BASE ?>assets/js/jquery.js"></script>
    <script src="<?= URL_BASE ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/swiper.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/progress.js"></script>
    <script src="<?= URL_BASE ?>assets/js/lightcase.js"></script>
    <script src="<?= URL_BASE ?>assets/js/counter-up.js"></script>
    <script src="<?= URL_BASE ?>assets/js/isotope.pkgd.js"></script>
    <script src="<?= URL_BASE ?>assets/js/slick.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/script.js"></script>
</body>

</html>