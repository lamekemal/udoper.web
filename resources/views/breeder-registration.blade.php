<!DOCTYPE html>
<html lang="fr">

<head>
    <title>UDOPER-AD | Ajouter un éleveur</title>
    <link rel="icon" href="/images/icon.webp" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description"
        content="Formulaire public pour ajouter un éleveur au registre de l'UDOPER Atakora Donga.">

    <meta name="keywords"
        content="UDOPER, éleveur, ajout éleveur, formulaire, Bénin, Atakora Donga">

    <meta content="Kemal Worou DARA" name="author">


    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="/css/swiper.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link id="colors" href="/css/colors/scheme-01.css" rel="stylesheet" type="text/css">

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

        <header class="transparent header-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div id="logo">
                                    <a href="/">
                                        <img class="logo-main" src="/images/logo-black.webp" alt="">
                                        <img class="logo-scroll" src="/images/logo-black.webp" alt="">
                                        <img class="logo-mobile" src="/images/logo-black.webp" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="/">Accueil</a></li>
                                    <li><a class="menu-item" href="/projet">Projets</a></li>
                                    <li><a class="menu-item" href="/blog">Blog / Publication</a></li>
                                    <li><a class="menu-item" href="/contact">Contact</a></li>
                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    @if (Route::has('login'))
                                    <a href="{{ route('dashboard') }}" class="btn-main fx-slide"><span>Tableau de Bord</span></a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn-main fx-slide"><span>Connexion</span></a>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-main fx-slide"><span>Créer un compte</span></a>
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

        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <section id="subheader" class="bg-color-op-1 text-center">
                <div class="container relative z-2">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h1 class="wow fadeInUp">Ajouter un éleveur</h1>
                            <div class="border-bottom my-3"></div>
                            <ul class="crumb wow fadeInDown">
                                <li><a href="/">Accueil</a></li>
                                <li class="active">Ajouter un éleveur</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pt-60 pb-60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="bg-white p-4 rounded-2 shadow-sm">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form method="POST" action="{{ route('breeders.store') }}">
                                    @csrf

                                    <div class="row gy-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Prénom *</label>
                                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Nom *</label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Contact *</label>
                                            <input type="text" name="contact" value="{{ old('contact') }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Courriel</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Numéro éleveur *</label>
                                            <input type="text" name="breeder_number" value="{{ old('breeder_number') }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Commune</label>
                                            <input type="text" name="city" value="{{ old('city') }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Quartier</label>
                                            <input type="text" name="borough" value="{{ old('borough') }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Village</label>
                                            <input type="text" name="neighborhood" value="{{ old('neighborhood') }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Organisation</label>
                                            <input type="text" name="organization" value="{{ old('organization') }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Date de naissance</label>
                                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Lieu de naissance</label>
                                            <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Photo ID</label>
                                            <input type="file" name="id_photo" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Photo Signature</label>
                                            <input type="file" name="signature_photo" class="form-control">
                                        </div>
                                        <div class="col-12 text-end mt-3">
                                            <button type="submit" class="btn-main"><span>Envoyer</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="section-dark">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-4 col-sm-6">
                        <img src="/images/logo-white.webp" class="logo-footer" alt="Logo UDOPER AD">
                        <div class="spacer-20"></div>
                        <p>À l'UDOPER Atakora Donga, nous nous consacrons à la défense des intérêts des éleveurs et à la promotion d'un élevage familial performant. Notre structure professionnelle accompagne ses membres pour assurer un développement pastoral durable et sécurisé.</p>
                    </div>
                    <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Notre association</h5>
                                    <ul id="ul-check">
                                        <li><a href="/">Accueil</a></li>
                                        <li><a href="/projet">Projets</a></li>
                                        <li><a href="/blog">Blog / Publication</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
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
                            <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color"></i>Djougou, Sassirou</div>
                            3eme VONS, Face service des Travaux Publics
                            <div class="spacer-20"></div>
                            <div class="fw-bold text-white"><i class="icofont-phone me-2 id-color"></i>Téléphone</div>
                            +229 01 97 09 17 28
                            <div class="spacer-20"></div>
                            <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color"></i>Contact mail</div>
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
                                    Copyright 2026 - UDOPER AD <a href="https://www.archeos.africa" target="_blank">- Archeos</a>. Tous droits réservés.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
 <!-- Javascript Files
    ================================================== -->
    <script src="/js/plugins.js"></script>
    <script src="/js/designesia.js"></script>
    <script src="/js/swiper.js"></script>
    <script src="/js/custom-swiper-1.js"></script>
    <script src="/js/custom-marquee.js"></script>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?LR-verbose&snipver=1&LiveTest=1"></' + 'script>')</script>
</body>

</html>
