<!DOCTYPE html>
<html lang="fr">

<head>
    <title>UDOPER-AD | Union des Organisations Professionnelles d’Éleveurs - Atakora Donga</title>
    <link rel="icon" href="images/icon.webp" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description"
        content="L'UDOPER Atakora Donga défend les intérêts des éleveurs de ruminants au Bénin. Promotion de l'élevage familial, transformation du lait en fromage et développement durable dans 13 communes.">

    <meta name="keywords"
        content="UDOPER, élevage Bénin, Atakora Donga, éleveurs ruminants, transformation lait, fromage de chèvre, coopérative agricole, UCOPER, ANOPER, développement pastoral">

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

      <!-- header begin -->
      <header class="transparent header-light">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="de-flex sm-pt10">
                <div class="de-flex-col">
                  <!-- logo begin -->
                  <div id="logo">
                    <a href="/">
                      <img
                        class="logo-main"
                        src="images/logo-black.webp"
                        alt=""
                      />
                      <img
                        class="logo-scroll"
                        src="images/logo-black.webp"
                        alt=""
                      />
                      <img
                        class="logo-mobile"
                        src="images/logo-black.webp"
                        alt=""
                      />
                    </a>
                  </div>
                  <!-- logo end -->
                </div>
                <div class="de-flex-col header-col-mid">
                  <!-- mainemenu begin -->
                  <ul id="mainmenu">
                    <li><a class="menu-item" href="/">Accueil</a></li>
                    <li><a class="menu-item" href="/projet">Projets</a></li>
                    <li>
                      <a class="menu-item" href="/blog">Blog / Publication</a>
                    </li>
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

        <section id="subheader" class="bg-color-op-1 text-center">
          <div class="container relative z-2">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <h1 class="wow fadeInUp">Contactez-nous</h1>
                <div class="border-bottom my-3"></div>
                <ul class="crumb wow fadeInDown">
                  <li><a href="index.html">Accueil</a></li>
                  <li class="active">Contact</li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section>
          <div class="container">
            <div class="row g-4">
              <div class="col-lg-6">
                <div class="subtitle">Entrez en contact</div>
                <h2 class="wow fadeInUp">
                  Nous sommes toujours prêts à accompagner les éleveurs et
                  répondre à vos questions
                </h2>

                <p>
                  Que vous soyez un éleveur, un partenaire ou un visiteur
                  souhaitant en savoir plus sur nos activités dans l'Atakora et
                  la Donga, n'hésitez pas à nous contacter. Remplissez le
                  formulaire ci-dessous et notre équipe vous répondra dans les
                  plus brefs délais.
                </p>

                <div class="row g-4 gx-5">
                  <div class="col-lg-6">
                    <div class="fw-bold text-dark">
                      <i class="icofont-clock-time me-2 id-color-2"></i>Heures
                      d'ouverture
                    </div>
                    Lundi - Samedi : 08h00 - 20h00
                  </div>

                  <div class="col-lg-6">
                    <div class="fw-bold text-dark">
                      <i class="icofont-location-pin me-2 id-color-2"></i>Siège
                      Social
                    </div>
                    Djougou, République du Bénin
                  </div>

                  <div class="col-lg-6">
                    <div class="fw-bold text-dark">
                      <i class="icofont-phone me-2 id-color-2"></i>Appelez-nous
                    </div>
                    +229 01 97 45 67 89
                  </div>

                  <div class="col-lg-6">
                    <div class="fw-bold text-dark">
                      <i class="icofont-envelope me-2 id-color-2"></i>Envoyez un
                      message
                    </div>
                    udoperad@yahoo.fr
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="p-40 bg-color-op-1 rounded-1">
                  <h3>Écrivez-nous</h3>
                  <form
                    name="contactForm"
                    id="contact_form"
                    method="post"
                    action="/contact"
                  >
                    <div class="mb-4">
                      <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="Votre Nom"
                        required
                      />
                    </div>

                    <div class="mb-4">
                      <input
                        type="text"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Votre Email"
                        required
                      />
                    </div>

                    <div class="mb-4">
                      <input
                        type="text"
                        name="phone"
                        id="phone"
                        class="form-control"
                        placeholder="Votre Téléphone"
                        required
                      />
                    </div>

                    <div class="mb-4 mb20">
                      <textarea
                        name="message"
                        id="message"
                        class="form-control"
                        placeholder="Votre Message"
                        required
                      ></textarea>
                    </div>

                    <div id="submit" class="mt20">
                      <input
                        type="submit"
                        id="send_message"
                        value="Envoyer le message"
                        class="btn-main"
                      />
                    </div>

                    <div id="success_message" class="success">
                      Votre message a été envoyé avec succès. Nous vous
                      répondrons bientôt.
                    </div>
                    <div id="error_message" class="error">
                      Désolé, une erreur est survenue lors de l'envoi du
                      formulaire.
                    </div>
                  </form>
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
              <img
                src="images/logo-white.webp"
                class="logo-footer"
                alt="Logo UDOPER AD"
              />
              <div class="spacer-20"></div>
              <p>
                À l'UDOPER Atakora Donga, nous nous consacrons à la défense des
                intérêts des éleveurs et à la promotion d'un élevage familial
                performant. Notre structure professionnelle accompagne ses
                membres pour assurer un développement pastoral durable et
                sécurisé.
              </p>

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
                      <li><a href="/">Accueil</a></li>
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
                <div class="fw-bold text-white">
                  <i class="icofont-location-pin me-2 id-color"></i>Djougou,
                  Sassirou
                </div>
                3eme VONS, Face service des Travaux Publics
                <div class="spacer-20"></div>

                <div class="fw-bold text-white">
                  <i class="icofont-phone me-2 id-color"></i>Téléphone
                </div>
                +229 01 97 09 17 28
                <div class="spacer-20"></div>

                <div class="fw-bold text-white">
                  <i class="icofont-envelope me-2 id-color"></i>Contact mail
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
                    Copyright 2026 - UDOPER AD
                    <a href="https://www.archeos.africa" target="_blank">
                      - Archeos</a
                    >. Tous droits réservés.
                  </div>
                  <ul class="menu-simple">
                    <li>
                      <a href="/privacy.html">Politique de confidentialité</a>
                    </li>
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
        <img src="images/logo-white.webp" class="w-150px" alt="" />

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
        <div>
          <i class="icofont-clock-time me-2 op-5"></i>Lundi - Samedi 08.00 -
          18.00
        </div>
        <div>
          <i class="icofont-location-pin me-2 op-5"></i>Djougou, Sassirou
        </div>
        <div><i class="icofont-envelope me-2 op-5"></i>udoperad@yahoo.fr</div>

        <div class="spacer-30-line"></div>

        <h5>À propos de nous</h5>
        <p>
          L'UDOPER Atakora Donga est une organisation coopérative dédiée à la
          promotion d'un élevage familial performant. Notre structure
          professionnelle accompagne les éleveurs de ruminants pour garantir un
          environnement écologique, économique et social sécurisé de manière
          durable.
        </p>

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
    <script src="js/validation-contact.js"></script>
  </body>
</html>
