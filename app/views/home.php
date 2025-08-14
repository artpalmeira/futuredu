<?php require_once('template/head.php'); ?>


<body>

    <!-- preloader Início -->
    <!-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- preloader Fim -->

    <!-- scrollToTop -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop -->


    <!-- Cabeçalho - Início -->
    <?php require_once('template/header.php'); ?>
    <!-- Cabeçalho - Fim -->

    <!-- Inicio da seção do banner -->
    <section class="banner">
        <div class="site">
            <div class="section-bloco">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-10">
                        <div class="banner-conteudo">
                            <h6 class="subtitle text-uppercase fw-medium">
                                Educação para o Futuro
                            </h6>
                            <h2 class="title">
                                <span class="d-lg-block">Transforme seu</span> Conhecimento
                                <span class="d-lg-block">com a FuturEdu</span>
                            </h2>
                            <p class="desc">
                                Cursos online e presenciais com especialistas renomados.
                                Desenvolva habilidades essenciais e conquiste novas
                                oportunidades no mercado de trabalho!
                            </p>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6">
                        <div class="banner-thumb">
                            <img src="<?= URL_BASE ?>assets/img/banner/01.png" alt="FuturEdu - Educação para o Futuro">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim da seção do banner -->


    <!-- Inicio da seção de logos -->
    <div class="logos">
        <div class="site">
            <div class="slider-logos">
                <img src="assets/img/logo-linguagens/c++.png" alt="C++" />
                <img src="assets/img/logo-linguagens/c-sharp.png" alt="C#" />
                <img src="assets/img/logo-linguagens/css.png" alt="sponsor" />
                <img src="assets/img/logo-linguagens/excel.png" alt="Excel" />
                <img src="assets/img/logo-linguagens/git.png" alt="Git" />
                <img src="assets/img/logo-linguagens/html.png" alt="HTML" />
                <img src="assets/img/logo-linguagens/js.png" alt="JS" />
                <img src="assets/img/logo-linguagens/mysql.png" alt="MySQL" />
                <img src="assets/img/logo-linguagens/php.png" alt="PHP" />
                <img src="assets/img/logo-linguagens/ts.png" alt="TS" />
            </div>
        </div>
    </div>
    <!-- Fim da seção de logos -->

    <!-- Início da seção de categorias -->
    <div class="categorias">
        <div class="site">
            <div class="categoria-text-top">
                <span class="subtitle">Cursos Populares</span>
                <h2 class="title">Principais Cursos de Desenvolvimento</h2>
            </div>
            <div class="lista">
                <div>

                    <!-- Categoria: Desenvolvimento Web -->
                    <?php foreach ($cursos as $linha): ?>
                        <div>
                            <div class="lista-categoria">
                                <img src="assets/img/curso/<?php echo $linha['foto_curso'] ?>" alt="<?php echo $linha['nome_curso'] ?>" />
                                <div class="conteudo-categoria">
                                    <a href="#">
                                        <h6><?php echo $linha['nome_curso'] ?></h6>
                                    </a>
                                    <span><?php echo $linha['carga_horaria_curso'] . ' horas | R$ ' . $linha['valor_curso']; ?> </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>

                <div class="txt-btn">
                    <a href="curso" class="btn-categoria"><span>Ver Todos os Cursos</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim da seção de categorias -->


    <div class="curso-destaque">
        <div class="site">
            <div class="curso-header">
                <span>Cursos em Destaque</span>
                <h2>Escolha um Curso para Começar</h2>
            </div>

            <div class="curso-conteudo">
                <!-- Card 1 -->
                <div class="item">
                    <div>
                        <div class="thumb">
                            <img src="assets/img/categorias/devweb.jpg" alt="Curso de HTML, CSS e JS">
                        </div>
                        <div class="info">
                            <div class="category">
                                <span>Desenvolvimento Web</span>
                                <div class="review">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <span>12 avaliações</span>
                                </div>
                            </div>
                            <h5>Fundamentos de HTML, CSS e JavaScript para Web</h5>

                            <div class="details">
                                <span><i class="icofont-video-alt"></i> 25 Aulas</span>
                                <span><i class="icofont-signal"></i> Curso Online</span>
                            </div>

                            <div class="footer">
                                <div class="author">
                                    <img src="assets/img/professor/Carlos-Silva.png" alt="Autor do curso">
                                    <span class="name">Carlos Silva</span>
                                </div>
                                <div class="btn">
                                    <a href="#">Saiba Mais <i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="item">
                    <div>
                        <div class="thumb">
                            <img src="assets/img/categorias/python.jpg" alt="Curso de JavaScript e Frameworks">
                        </div>
                        <div class="info">
                            <div class="category">
                                <span>JavaScript e Frameworks</span>
                                <div class="review">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <span>15 avaliações</span>
                                </div>
                            </div>
                            <h5>JavaScript Moderno e Frameworks Front-End</h5>

                            <div class="details">
                                <span><i class="icofont-video-alt"></i> 30 Aulas</span>
                                <span><i class="icofont-signal"></i> Curso Online</span>
                            </div>

                            <div class="footer">
                                <div class="author">
                                    <img src="assets/img/professor/Mariana-Rocha.png" alt="Autor do curso">
                                    <span class="name">Mariana Rocha</span>
                                </div>
                                <div class="btn">
                                    <a href="#">Saiba Mais <i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="item">
                    <div>
                        <div class="thumb">
                            <img src="assets/img/categorias/ia.jpg" alt="Curso de PHP e MySQL">
                        </div>
                        <div class="info">
                            <div class="category">
                                <span>PHP e MySQL</span>
                                <div class="review">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <span>10 avaliações</span>
                                </div>
                            </div>
                            <h5>Criação de Aplicações Web com PHP e MySQL</h5>

                            <div class="details">
                                <span><i class="icofont-video-alt"></i> 28 Aulas</span>
                                <span><i class="icofont-signal"></i> Curso Online</span>
                            </div>

                            <div class="footer">
                                <div class="author">
                                    <img src="assets/img/professor/Lucas-Fernandes.png" alt="Autor do curso">
                                    <span class="name">Lucas Fernandes</span>
                                </div>
                                <div class="btn">
                                    <a href="#">Saiba Mais <i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.curso-conteudo -->

        </div> <!-- /.site -->
    </div> <!-- /.curso-destaque -->


    <div class="secao-sobre">
        <div class="container">
            <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-end flex-row-reverse">
                <!-- Texto e informações da seção -->
                <div class="col">
                    <div class="sobre-direita padding-tb">
                        <div class="cabecalho-secao">
                            <span class="subtitulo">Sobre a FuturEdu</span>
                            <h2 class="titulo">
                                Qualificação Profissional e Habilidades para o Futuro
                            </h2>
                            <p>
                                Na FuturEdu, conectamos tecnologia e aprendizado para preparar
                                você para o mercado de trabalho. Oferecemos cursos dinâmicos e
                                atualizados, com foco em desenvolvimento de software, análise
                                de dados e inovação digital. Nossa metodologia combina ensino
                                interativo, práticas reais e certificações reconhecidas.
                            </p>
                        </div>
                        <div class="envoltoria-secao">
                            <ul class="lista-lab">
                                <!-- Instrutores Qualificados -->
                                <li>
                                    <div class="lado-esquerdo">
                                        <img src="assets/img/professor/Carlos-Silva.png" alt="Instrutores Qualificados">
                                    </div>
                                    <div class="lado-direito">
                                        <h5>Instrutores Especializados</h5>
                                        <p>
                                            Nossos professor são profissionais do mercado,
                                            trazendo experiência real para dentro da sala de aula.
                                        </p>
                                    </div>
                                </li>

                                <!-- Certificação Reconhecida -->
                                <li>
                                    <div class="lado-esquerdo">
                                        <img src="assets/img/professor/Lucas-Fernandes.png" alt="Certificado Reconhecido">
                                    </div>
                                    <div class="lado-direito">
                                        <h5>Certificação Valorizada</h5>
                                        <p>
                                            Ao concluir nossos cursos, você recebe um certificado
                                            que comprova suas habilidades e impulsiona sua carreira.
                                        </p>
                                    </div>
                                </li>

                                <!-- Aulas Online e Flexíveis -->
                                <li>
                                    <div class="lado-esquerdo">
                                        <img src="assets/img/professor/Mariana-Rocha.png" alt="Aulas Online">
                                    </div>
                                    <div class="lado-direito">
                                        <h5>Aulas Online e Flexíveis</h5>
                                        <p>
                                            Estude no seu ritmo com nossa plataforma moderna e
                                            acessível de qualquer lugar.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Imagem da seção -->
                <div class="col">
                    <div class="sobre-esquerda">
                        <div class="imagem-sobre">
                            <img src="assets/img/sobre/instalacoes.png" alt="Sobre a FuturEdu">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="instructor-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Instrutores Especializados</span>
                <h2 class="title">Aulas ministradas por criadores reais</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="<?= URL_BASE ?>assets/img/professor/Carlos-Silva.png" alt="Carlos-Silva">
                                </div>
                                <div class="instructor-content">
                                    <a href="#">
                                        <h4>Emilee Logan</h4>
                                    </a>
                                    <p>Mestrado em Educação</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 08 cursos</li>
                                    <li><i class="icofont-users-alt-3"></i> 30 alunos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="<?= URL_BASE ?>assets/img/professor/Lucas-Fernandes.png" alt="Lucas-Fernandes">
                                </div>
                                <div class="instructor-content">
                                    <a href="#">
                                        <h4>Donald Logan</h4>
                                    </a>
                                    <p>Mestrado em Educação</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 08 cursos</li>
                                    <li><i class="icofont-users-alt-3"></i> 30 alunos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="<?= URL_BASE ?>assets/img/professor/Mariana-Rocha.png" alt="Mariana-Rocha">
                                </div>
                                <div class="instructor-content">
                                    <a href="#">
                                        <h4>Oliver Porter</h4>
                                    </a>
                                    <p>Mestrado em Educação</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 08 cursos</li>
                                    <li><i class="icofont-users-alt-3"></i> 30 alunos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="<?= URL_BASE ?>assets/img/professor/Mariana-Rocha.png" alt="Mariana-Rocha">
                                </div>
                                <div class="instructor-content">
                                    <a href="#">
                                        <h4>Nahla Jones</h4>
                                    </a>
                                    <p>Mestrado em Educação</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 08 cursos</li>
                                    <li><i class="icofont-users-alt-3"></i> 30 alunos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center footer-btn">
                    <p>Quer ajudar as pessoas a aprender, crescer e alcançar mais na vida?<a href="#">Torne-se um instrutor</a></p>
                </div>
            </div>
        </div>
    </div>





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






    <script src="<?= URL_BASE ?>assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/swiper.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/progress.js"></script>
    <script src="<?= URL_BASE ?>assets/js/lightcase.js"></script>
    <script src="<?= URL_BASE ?>assets/js/counter-up.js"></script>
    <script src="<?= URL_BASE ?>assets/js/isotope.pkgd.js"></script>
    <script src="<?= URL_BASE ?>assets/js/slick.min.js"></script>
    <script src="<?= URL_BASE ?>assets/js/script.js"></script>


</body>

</html>