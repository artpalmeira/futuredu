<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Configuração Básica -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Título da Página -->
    <title><?= $curso['nome_curso']; ?></title>


    <!-- Ícones e Favicons -->
    <!-- Define ícones para diferentes dispositivos e tamanhos -->
    <link rel="shortcut icon" href="assets/img/icon/favicon-32x32.png" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon/android-icon-192x192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/apple-icon-180x180.png" />

    <!-- Meta Tags de Aplicação -->
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/img/icon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="manifest" href="assets/img/icon/manifest.json" />

    <!-- Estilos Globais -->
    <!-- Bibliotecas externas de CSS para animações e componentes -->
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/icofont.min.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/swiper.min.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/lightcase.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/slick.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/slick-theme.css" />

    <!-- Estilos Personalizados -->
    <!-- Aqui ficam os estilos próprios da plataforma -->
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/animate.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/style_mold.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/style.css" />
</head>

<body id="detalhe">

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


    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
                <div class="col-lg-7 col-12">
                    <div class="pageheader-thumb">
                        <img src="<?= URL_BASE ?>assets/img/curso/<?= $curso['foto_curso'] ?>" alt="<?= $curso['nome_curso']; ?>" class="w-100">
                        <a href="https://www.youtube-nocookie.com/embed/jP649ZHA8Tg" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="pageheader-content">
                        <div class="course-category">
                            <a href="#" class="course-cate"><?= $curso['nivel_curso'] ?></a>
                            <a href="#" class="course-offer"><?= $curso['modalidade_curso'] ?></a>
                        </div>
                        <h2 class="phs-title"><?= $curso['nome_curso']; ?></h2>
                        <p class="phs-desc"><?= $curso['descricao_curso']; ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->


    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg">
        <div class="site">
            <div class="row justify-content-center">

                <div class="col-lg-8">
                    <div class="main-part">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-content">
                                    <h3><?= $curso['nome_curso']; ?></h3>
                                    <p><?= $curso['descricao_curso']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-part">
                        <div class="course-side-detail">
                            <div class="csd-title">
                                <div class="csdt-left">
                                    <h4 class="mb-0"><sup>R$</sup><?= $curso['valor_curso']; ?></h4>
                                </div>
                                <div class="csdt-right">
                                    <p class="mb-0"><i class="icofont-clock-time"></i><?= $curso['carga_horaria_curso']; ?></p>
                                </div>
                            </div>
                            <div class="csd-content">
                                <div class="csdc-lists">
                                    <ul class="lab-ul">
                                        <li>
                                        
                                        <li>
                                            <div class="csdc-left"><i class="icofont-book-alt"> </i>Nível:<?= $curso['nivel_curso']; ?></div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-signal"></i>Modalidade: <?= $curso['modalidade_curso']; ?></div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-video-alt"></i>Área: <?= $curso['area_curso']; ?></div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-hour-glass"></i>Pré requisito :<?= $curso['pre_requisito_curso']; ?></div>
                                        </li>
                                        
                                    </ul>
                                </div>


                                <div class="course-enroll">
                                    <a href="#" class="lab-btn"><span>Faça sua inscrição</span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course section ending here -->




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