<!DOCTYPE html>
<html lang="fr">

<head>
    <title>UDOPER-AD | Union Départementale des Organisations Professionnelles d’Éleveurs  de Ruminants- Atacora Donga</title>
    <link rel="icon" href="images/icon.webp" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description"
        content="L'UDOPER Atacora Donga défend les intérêts des éleveurs de ruminants au Bénin. Promotion de l'élevage familial, transformation du lait en fromage et développement durable dans 13 communes.">

    <meta name="keywords"
        content="UDOPER, élevage Bénin, Atacora Donga, éleveurs ruminants, transformation lait, fromage de chèvre, coopérative agricole, UCOPER, ANOPER, développement pastoral">

    <meta content="Kemal Worou DARA" name="author">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="css/plugins.css" rel="stylesheet" type="text/css">
    <link href="css/swiper.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css">

    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Udoper AD" />
    <link rel="manifest" href="/site.webmanifest" />
</head>

<body>
    <div id="wrapper">
        <a href="/" id="back-to-top"></a>

        <!-- preloader begin -->
        <!--div id="de-loader"></div-->
        <!-- preloader end -->

        <!-- header begin -->
        <header class="transparent scroll-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="/">
                                        <img class="logo-main" src="images/logo-white.webp" alt="">
                                        <img class="logo-scroll" src="images/logo-black.webp" alt="">
                                        <img class="logo-mobile" src="images/logo-white.webp" alt="">
                                    </a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainemenu begin -->
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="/">Accueil</a>
                                    </li>
                                    <li><a class="menu-item" href="/projet">Projets</a></li>
                                    <li><a class="menu-item" href="/blog">Blog / Publication</a></li>
                                    <li><a class="menu-item" href="/contact">Contact</a></li>
                                </ul>
                                <!-- mainmenu end -->
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    @if (Route::has('login'))
                                    <a href="{{ route('dashboard') }}" class="btn-main fx-slide"><span>Tableau de
                                            Bord</span></a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn-main fx-slide"><span>Connexion</span></a>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-main fx-slide"><span>Créer un
                                            compte</span></a>
                                    @endif
                                    @endif

                                    <span id="menu-btn"></span>
                                </div>

                                <div id="btn-extra">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">

            <div id="top"></div>

            <section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden">

                <div class="relative">
                    <div class="abs abs-centered w-100 z-2">
                        <div class="container">
                            <div class="row g-4 align-items-center justify-content-between">

                                <div class="col-lg-6">
                                    <div class="spacer-single sm-hide"></div>
                                    <div class="subtitle">UDOPER ATACORA-DONGA </div>
                                    <h1>Valoriser l'Élevage avec de ruminants</h1>
                                    <!--a class="btn-main btn-line fx-slide" href="#"><span>Book Appointment</span></a-->
                                </div>

                                <!--div class="d-lg-flex align-items-center">
                                    <div class="me-3">Google Rating</div>
                                    <div class="de-flex justify-content-start align-items-center">
                                        <div class="me-3">5.0</div>
                                        <div class="d-flex fs-14 d-rating me-3">
                                            <i class="fa fa-solid fa-star m-1"></i>
                                            <i class="fa fa-solid fa-star m-1"></i>
                                            <i class="fa fa-solid fa-star m-1"></i>
                                            <i class="fa fa-solid fa-star m-1"></i>
                                            <i class="fa fa-solid fa-star m-1"></i>
                                        </div>
                                    </div>
                                    <div class="me-3">Based on 23k Reviews</div>
                                </div-->

                            </div>

                        </div>
                    </div>

                    <div class="mh-800">
                        <div class="swiper wow scaleIn">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="swiper-inner" data-bgimage="url(images/slider/1.webp) center">
                                        <div class="sw-overlay op-5"></div>
                                        <div class="gradient-edge-left z-2"></div>

                                    </div>
                                </div>
                                <!-- Slides -->

                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="swiper-inner" data-bgimage="url(images/slider/2.webp) center">
                                        <div class="sw-overlay op-5"></div>
                                        <div class="gradient-edge-left z-2"></div>
                                    </div>
                                </div>
                                <!-- Slides -->


                            </div>

                        </div>
                    </div>
                </div>

            </section>

            <section class="bg-dark text-light pt-50 pb-30">
                <div class="container relative">
                    <div class="row g-4 grid-divider">
                        <div class="col-lg-4 col-md-6 mb-sm-30">
                            <div class="d-flex justify-content-center">
                                <i class="fs-60 id-color icon_phone"></i>
                                <div class="ms-3">
                                    <h4 class="mb-0">Contact</h4>
                                    <p>Tel: +229 01 52 88 02 60</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-sm-30">
                            <div class="d-flex justify-content-center">
                                <i class="fs-60 id-color icon_clock"></i>
                                <div class="ms-3">
                                    <h4 class="mb-0">Heures d'ouverture</h4>
                                    <p>Lun à Ven 08:00 - 18:00</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-sm-30">
                            <div class="d-flex justify-content-center">
                                <i class="fs-60 id-color icon_mail"></i>
                                <div class="ms-3">
                                    <h4 class="mb-0">Email</h4>
                                    <p>udoperad@yahoo.fr</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row g-4 gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="row g-4">
                                <div class="col-6">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class=" rounded-1 overflow-hidden wow zoomIn">
                                                <img src="images/misc/p1.webp" class="w-100 wow scaleIn" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row g-4">
                                        <div class="spacer-single sm-hide"></div>
                                        <div class="col-lg-12">
                                            <div class=" rounded-1 overflow-hidden wow zoomIn" data-wow-delay=".3s">
                                                <img src="images/misc/p2.webp" class="w-100 wow scaleIn" alt=""
                                                    data-wow-delay=".3s">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="me-lg-3">
                                <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">À propos de nous</div>

                                <h2 class="wow fadeInUp" data-wow-delay=".2s">Une Expertise Collective pour une Élevage
                                    Performant et Durable</h2>

                                <p class="wow fadeInUp" data-wow-delay=".4s">
                                    L'UDOPER Atacora Donga est une structure coopérative faîtière départementale qui
                                    œuvre pour un élevage familial productif dans un environnement écologique,
                                    économique et social sécurisé. Nous nous engageons à défendre les intérêts des
                                    éleveurs et à promouvoir le développement durable du secteur pastoral.
                                </p>

                                <ul class="ul-check text-dark cols-2 fw-600 mb-4 wow fadeInUp" data-wow-delay=".6s">
                                    <li>Défense des intérêts des éleveurs </li>
                                    <li>Appui technique et managérial </li>
                                    <li>Promotion de l'élevage familial </li>
                                    <li>Services de qualité aux membres </li>
                                </ul>

                                <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s"
                                    href="/contact"><span>Nous contacter</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-color-op-1">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="subtitle wow fadeInUp mb-3">Nos Services</div>
                            <h2 class="wow fadeInUp" data-wow-delay=".2s">Un Accompagnement Complet pour le
                                Développement de l'Élevage de ruminants</h2>
                            <p class="col-lg-10 offset-lg-1 mb-0 wow fadeInUp">
                                De l'appui technique à la valorisation des produits, nous offrons des solutions adaptées
                                pour renforcer la productivité des éleveurs et améliorer durablement leurs conditions de
                                vie.
                            </p>
                            <div class="spacer-single"></div>

                            <div class="row text-start mt-4">
                                <div class="col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <h4>Promotion de la Filière Lait</h4>
                                    <p>Soutien à la production, à la transformation et à la commercialisation du fromage
                                        de lait de vache.</p>
                                </div>
                                <div class="col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                    <h4>Organisation Coopérative</h4>
                                    <p>Mise en place de groupements de femmes transformatrices et structuration des
                                        coopératives.</p>
                                </div>
                                <div class="col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <h4>Suivi Sanitaire</h4>
                                    <p>Conduite du suivi vétérinaire et défense des ressources pastorales pour la
                                        transhumance.</p>
                                </div>
                                <div class="col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                    <h4>Appui Managérial</h4>
                                    <p>Renforcement des capacités techniques et gestion professionnelle des
                                        organisations membres.</p>
                                </div>
                            </div>

                            <div class="spacer-half"></div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover">
                                <div class="bg-white h-100 p-40 rounded-1">
                                    <img src="images/icons/defense.png" class="w-70px mb-3 wow scaleIn"
                                        alt="Défense des intérêts">
                                    <div class="relative mt-4 wow fadeInUp">
                                        <h4>Défense des Intérêts</h4>
                                        <p>Représentation des éleveurs auprès des pouvoirs publics pour sécuriser leur
                                            cadre de vie et de travail.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="hover">
                                <div class="bg-white h-100 p-40 rounded-1">
                                    <img src="images/icons/milk.png" class="w-70px mb-3 wow scaleIn"
                                        alt="Transformation du lait">
                                    <div class="relative mt-4 wow fadeInUp">
                                        <h4>Valorisation du Lait</h4>
                                        <p>Appui à la production et mise en place de coopératives de transformation du
                                            lait de vache en fromage.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="hover">
                                <div class="bg-white h-100 p-40 rounded-1">
                                    <img src="images/icons/health.png" class="w-70px mb-3 wow scaleIn"
                                        alt="Suivi vétérinaire">
                                    <div class="relative mt-4 wow fadeInUp">
                                        <h4>Suivi Vétérinaire</h4>
                                        <p>Conduite de suivis sanitaires et protection des ressources pastorales
                                            indispensables à la transhumance.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="hover">
                                <div class="bg-white h-100 p-40 rounded-1">
                                    <img src="images/icons/management.png" class="w-70px mb-3 wow scaleIn"
                                        alt="Appui managérial">
                                    <div class="relative mt-4 wow fadeInUp">
                                        <h4>Appui Managérial</h4>
                                        <p>Accompagnement technique pour une gestion professionnelle des organisations
                                            d'éleveurs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-dark text-light pt-60 pb-60">
                <div class="container">

                    <div class="row g-4">
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="de_count wow fadeInRight" data-wow-delay=".0s">
                                <h3 class="fs-40 mb-0"><span class="timer" data-to="10000" data-speed="3000">0</span>+
                                </h3>
                                Eleveur hommes appuyés
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="de_count wow fadeInRight" data-wow-delay=".2s">
                                <h3 class="fs-40 mb-0"><span class="timer" data-to="2500" data-speed="3500">0</span>+
                                </h3>
                                Eleveur femmes appuyés
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="de_count wow fadeInRight" data-wow-delay=".4s">
                                <h3 class="fs-40 mb-0"><span class="timer" data-to="13" data-speed="13">0</span>+</h3>
                                Commune d'intervention
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center">
                            <div class="de_count wow fadeInRight" data-wow-delay=".6s">
                                <h3 class="fs-40 mb-0"><span class="timer" data-to="800" data-speed="3000">0</span>+</h3>
                                D'activités
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row gy-4 gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="subtitle id-color wow fadeInUp" data-wow-delay=".0s">Pourquoi choisir l'UDOPER
                                AD</div>
                            <h2 class="wow fadeInUp" data-wow-delay=".2s">Une expertise au service de l'élevage familial
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">
                                L'UDOPER Atacora Donga est une organisation bien structurée et gérée professionnellement
                                pour assurer un environnement durable à ses membres. Nous combinons défense des droits,
                                appui technique et innovation pour transformer l'élevage de ruminants en un véritable
                                levier de prospérité.
                            </p>

                            <div class="border-bottom mb-4"></div>

                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="h-100">
                                        <div class="relative wow fadeInUp">
                                            <h5>Expertise Reconnue</h5>
                                            <p class="mb-0">Accompagnement des organisations d'éleveurs.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="h-100">
                                        <div class="relative wow fadeInUp">
                                            <h5>Valorisation Laitière</h5>
                                            <p class="mb-0">Soutien actif à la transformation du lait de vache en
                                                fromage 'Gassire' de qualité.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="h-100">
                                        <div class="relative wow fadeInUp">
                                            <h5>Appui Managérial</h5>
                                            <p class="mb-0">Accompagnement technique et juridique pour le rayonnement de
                                                nos membres. Conseil technique spécialisé, en gestion des troupeaux, appui à l'accès au marché.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="h-100">
                                        <div class="relative wow fadeInUp">
                                            <h5>Impact Social</h5>
                                            <p class="mb-0">Un engagement fort pour l'épanouissement des familles
                                                d'éleveurs et des femmes transformatrices.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row g-4 align-items-center">
                                <div class="col-6 text-end">
                                    <div class="w-80 rounded-1 overflow-hidden mb-25 wow zoomIn d-inline-block">
                                        <img src="images/misc/s2.jpg" class="w-100 wow scaleIn" alt="">
                                    </div>
                                    <div class="w-100 rounded-1 overflow-hidden mb-25 wow zoomIn d-inline-block">
                                        <img src="images/misc/s3.jpeg" class="w-100 wow scaleIn" alt="">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="w-100 rounded-1 overflow-hidden mb-25 wow zoomIn d-inline-block">
                                        <img src="images/misc/p2.webp" class="w-100 wow scaleIn" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

            <section class="bg-color text-light pt-40 pb-40">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-md-9">
                            <h3 class="mb-0 fs-32">Prêt à nous soutenir ?</h3>
                        </div>
                        <div class="col-lg-3 text-lg-end">
                            <a class="btn-main btn-line fx-slide" href="/"><span>Faites un don</span></a>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="subtitle id-color wow fadeInUp" data-wow-delay=".0s">Tout ce que vous devez
                                savoir</div>
                            <h2 class="wow fadeInUp" data-wow-delay=".2s">Questions Fréquemment Posées</h2>
                        </div>

                        <div class="col-lg-7">
                            <div class="accordion s2 wow fadeInUp">
                                <div class="accordion-section">
                                    <div class="accordion-section-title" data-tab="#accordion-a1">
                                        Qu'est-ce que l'UDOPER AD ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a1">
                                        L'UDOPER Atacora Donga est une structure coopérative faîtière départementale. Sa
                                        mission est de défendre les intérêts des éleveurs de ruminants et de promouvoir
                                        un élevage familial performant et durable .
                                    </div>

                                    <div class="accordion-section-title" data-tab="#accordion-a2">
                                        Quelles sont vos communes d'intervention ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a2">
                                        Nous intervenons dans 13 communes des départements de l'Atacora et de la Donga :
                                        Djougou, Copargo, Ouaké, Bassila, Péhunco, Kérou, Kouandé, Natitingou, Boukombé,
                                        Cobly, Matéri, Tanguiéta et Toucountouna.
                                    </div>

                                    <div class="accordion-section-title" data-tab="#accordion-a3">
                                        Comment l'association est-elle financée ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a3">
                                        Notre financement provient des cotisations de nos membres issus des groupements
                                        professionnels (GPER et GFPER), ainsi que de l'appui de partenaires financiers.
                                        
                                    </div>

                                    <div class="accordion-section-title" data-tab="#accordion-a4">
                                        Quels services offrez-vous aux éleveurs ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a4">
                                        Nous offrons un appui technique et managérial, un suivi vétérinaire et
                                        sanitaire, la gestion de marchés à bétail, ainsi qu'un soutien spécifique aux
                                        femmes pour la transformation du lait en fromage.
                                    </div>

                                    <div class="accordion-section-title" data-tab="#accordion-a5">
                                        Comment êtes-vous organisés?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a5">
                                        L'organisation s'appuie sur une base pyramidale composée de groupements
                                        professionnels (GPER/GFPER), coordonnés par des Unions d'Arrondissement (UAGPER)
                                        et des Unions Communales (UCOPER).
                                    </div>

                                    
                                    <div class="accordion-section-title" data-tab="#accordion-a5">
                                        Quelles sont les partenaires de l'UDOPER AD ?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a5">
                                        AFDI, la Coopération Swiss à travers Swisscontact, VSF (Vétérinaires Sans Frontières), CDCS du ministère de l'Europe et des affaires étrangères et l'Union Européenne à travers ACTING FOR LIFE, IFDC (ACMA3), SNV (EJASA), le
                                        Ministère de l'Agriculture du Bénin.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- content end -->

        <!-- footer begin -->
        <footer class="section-dark">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-4 col-sm-6">
                        <img src="images/logo-white.webp" class="logo-footer" alt="Logo UDOPER AD">
                        <div class="spacer-20"></div>
                        <p>À l'UDOPER Atacora Donga, nous nous consacrons à la défense des intérêts des éleveurs et à la
                            promotion d'un élevage familial performant. Notre structure professionnelle accompagne ses
                            membres pour assurer un développement pastoral durable et sécurisé.</p>

                        <div class="social-icons mb-sm-30">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Notre association</h5>
                                    <!-- mainemenu begin -->
                                    <ul id="ul-check">
                                        <li><a href="/">Accueil</a>
                                        </li>
                                        <li><a href="/projet">Projets</a></li>
                                        <li><a href="/blog">Blog / Publication</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                    <!-- mainmenu end -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Nos services</h5>
                                    <ul>
                                        <li><a>Défense des Intérêts</a></li>
                                        <li><a>Valorisation du Lait</a></li>
                                        <li><a>Suivi Vétérinaire</a></li>
                                        <li><a>Appui Managérial</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                        <div class="widget">
                            <h5>Nos contacts</h5>
                            <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color"></i>Djougou,
                                Sassirou</div>
                            3eme VONS, Face service des Travaux Publics
                            <div class="spacer-20"></div>

                            <div class="fw-bold text-white"><i class="icofont-phone me-2 id-color"></i>Téléphone</div>
                            +229 01 66 49 99 44
                            <div class="spacer-20"></div>

                            <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color"></i>Contact mail
                            </div>
                            udoperad@yahoo.fr
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    Copyright 2026 - UDOPER AD <a href="https://www.archeos.africa" target="_blank"> -
                                        Archeos</a>. Tous droits réservés.
                                </div>
                                <ul class="menu-simple">
                                    <li><a href="/privacy.html">Politique de confidentialité</a></li>
                                    <li><a href="/terms">Conditions d'utilisation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
    </div>

    <!-- overlay content begin -->
    <div id="extra-wrap" class="text-light">
        <div id="btn-close">
            <span></span>
            <span></span>
        </div>

        <div id="extra-content">
            <img src="images/logo-white.webp" class="w-150px" alt="">

            <div class="spacer-30-line"></div>

            <h5>Nos services</h5>
            <ul>
                <li><a>Défense des Intérêts</a></li>
                <li><a>Valorisation du Lait</a></li>
                <li><a>Suivi Vétérinaire</a></li>
                <li><a>Appui Managérial</a></li>
            </ul>

            <div class="spacer-30-line"></div>

            <h5>Contact</h5>
            <div><i class="icofont-clock-time me-2 op-5"></i>Lundi - Samedi 08.00 - 18.00</div>
            <div><i class="icofont-location-pin me-2 op-5"></i>Djougou, Sassirou</div>
            <div><i class="icofont-envelope me-2 op-5"></i>udoperad@yahoo.fr</div>

            <div class="spacer-30-line"></div>

            <h5>À propos de nous</h5>
            <p>L'UDOPER Atacora Donga est une organisation coopérative dédiée à la promotion d'un élevage familial
                performant. Notre structure professionnelle accompagne les éleveurs de ruminants pour garantir un
                environnement écologique, économique et social sécurisé de manière durable.</p>

            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src="js/swiper.js"></script>
    <script src="js/custom-swiper-1.js"></script>
    <script src="js/custom-marquee.js"></script>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?LR-verbose&snipver=1&LiveTest=1"></' + 'script>')</script>
</body>

</html>
