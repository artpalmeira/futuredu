<!doctype html>
<html lang="pt_BR">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> FuturEdu | Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="Alle Palmeira - TIPI 03" />
    <meta
        name="description"
        content="Cursos online e presenciais com especialistas renomados. Desenvolva habilidades essenciais e conquiste novas oportunidades no mercado de trabalho!" />
    <meta
        name="keywords"
        content="Cursos, escola, tecnologia, informática, HTML, CSS, JS, PHP, MVC, Front-End, Back-End" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/dash/css/adminlte.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/dash/css/dash.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous" />
    <!-- jsvectormap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="<?= URL_BASE ?>" class="nav-link">Site FuturEdu</a></li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">

                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img
                                src="<?= URL_BASE ?>assets/dash/assets/img/user2-160x160.jpg"
                                class="user-image rounded-circle shadow"
                                alt="User Image" />
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img
                                    src="<?= URL_BASE ?>assets/dash/assets/img/user2-160x160.jpg"
                                    class="rounded-circle shadow"
                                    alt="User Image" />
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2023</small>
                                </p>
                            </li>
                            <!--end::User Image-->

                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                <a href="#" class="btn btn-default btn-flat float-end">Sair</a>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.html" class="brand-link">
                    <!--begin::Brand Image-->
                    <img
                        src="<?= URL_BASE ?>assets/img/logo-futuedu-branco.svg"
                        alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light"></span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul
                        class="nav sidebar-menu flex-column"
                        data-lte-toggle="treeview"
                        role="menu"
                        data-accordion="false">
                        <li class="nav-header">GESTÃO ESCOLAR</li>



                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>aluno/listar" class="nav-link">
                                <i class="nav-icon bi bi-person-lines-fill"></i>
                                <p>Alunos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>curso/listar" class="nav-link">
                                <i class="nav-icon bi bi-book-fill"></i>
                                <p>Cursos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>funcionario/listar" class="nav-link">
                                <i class="nav-icon bi bi-person-gear"></i>
                                <p>Funcionário</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>funcionario/professor" class="nav-link">
                                <i class="nav-icon bi bi-person-badge"></i>
                                <p>Professores</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>empresa/listar" class="nav-link">
                                <i class="nav-icon bi bi-building"></i>
                                <p>Empresas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>matricula/listar" class="nav-link">
                                <i class="nav-icon bi bi-journal-check"></i>
                                <p>Matrículas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>nota/listar" class="nav-link">
                                <i class="nav-icon bi bi-bar-chart-fill"></i>
                                <p>Notas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>projeto/listar" class="nav-link">
                                <i class="nav-icon bi bi-diagram-3-fill"></i>
                                <p>Projetos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>participacao_projeto/listar" class="nav-link">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>Part. em Projetos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>prof_curso/listar" class="nav-link">
                                <i class="nav-icon bi bi-link-45deg"></i>
                                <p>Prof. por Curso</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>sigla_curso/listar" class="nav-link">
                                <i class="nav-icon bi bi-bookmark-check-fill"></i>
                                <p>Siglas de Curso</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= URL_BASE ?>contato/listar" class="nav-link">
                                <i class="nav-icon bi bi-envelope-fill"></i>
                                <p>Contatos</p>
                            </a>
                        </li>

                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="<?= URL_BASE ?>">Site FuturEdu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Cursos</p>
                                </div>
                                <img class="small-box-icon" src="<?= URL_BASE ?>assets/dash/assets/img/svg/training_1654346.svg" alt="Cursos">

                            </div>
                            <!--end::Small Box Widget 1-->
                        </div>
                        <!--end::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 2-->
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3>53<sup class="fs-5">%</sup></h3>
                                    <p>Matrículas</p>
                                </div>
                                <img class="small-box-icon" src="<?= URL_BASE ?>assets/dash/assets/img/svg/business-cards_3160804.svg" alt="Matrículas">

                            </div>
                            <!--end::Small Box Widget 2-->
                        </div>
                        <!--end::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 3-->
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Projetos</p>
                                </div>
                                <img class="small-box-icon" src="<?= URL_BASE ?>assets/dash/assets/img/svg/project_3380841.svg" alt="Projetos">
                            </div>
                            <!--end::Small Box Widget 3-->
                        </div>
                        <!--end::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 4-->
                            <div class="small-box text-bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Professores</p>
                                </div>
                                <img class="small-box-icon" src="<?= URL_BASE ?>assets/dash/assets/img/svg/teacher_6454364.svg" alt="Professores">

                            </div>
                            <!--end::Small Box Widget 4-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->

                    <div class="row">
                        <!-- ÁREA CENTRAL DO CONTEÚDO DO DASH -->
                        <?php
                        if (isset($conteudo)) {
                            $this->carregarViews($conteudo, $dados);
                        } else {
                            echo '<h2> Bem-vindo ao Dashboard da FuturEdu</h2>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>

        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Alessandro Palmeira - SENAC SMP</div>
            <strong>
                Copyright &copy; 2024-2025&nbsp;
                <a href="<?= URL_BASE ?>" class="text-decoration-none">FuturEdu</a>.
            </strong>
            Todos oso direitos reservados.
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?= URL_BASE ?>assets/dash/js/adminlte.js"></script>


</body>
<!--end::Body-->

</html>