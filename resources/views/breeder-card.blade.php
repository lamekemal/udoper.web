<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carte de Membre ANOPER - {{ $breeder->full_name }}</title>
    <style>
        @page {
            size: 680px 380px;
            margin: 0;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background: #fff;
            -webkit-print-color-adjust: exact;
            color: #000;
        }
        /* Style de la signature */
        .signature-photo {
            width: 30mm;   /* Largeur ajustable */
            height: 15mm;  /* Hauteur ajustable */
            margin: 0 auto 2mm auto; /* Centre et ajoute de l'espace avec les dates */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signature-photo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; /* Garde les proportions de la signature */
        }
        /* ══════════════════ RECTO ══════════════════ */
        .card {
            width: 680px;
            height: 380px;
            background: #ffffff;
            border: 1px solid #ccc;
            overflow: hidden;
            page-break-after: always;
            position: relative;
            padding: 12px 18px 10px 18px;
            display: flex;
            flex-direction: column;
        }

        /* Titre principal
        .card-title {
            text-align: center;
            font-size: 15pt;
            font-weight: bold;
            text-decoration: underline;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            color: #000;
        }*/
        /* Conteneur parent pour aligner les logos et le titre */
        .card-header-container {
            display: flex;
            align-items: center;      /* Centre verticalement les logos et le texte */
            justify-content: space-between; /* Aligne un logo à gauche, un à droite, le titre au milieu */
            margin-bottom: 12px;
            width: 100%;
        }

        /* Style du titre ajusté */
        .card-title {
            flex: 1;                  /* Prend tout l'espace central disponible */
            text-align: center;       /* Centre parfaitement le texte au milieu */
            font-size: 15pt;
            font-weight: bold;
            text-decoration: underline;
            letter-spacing: 0.5px;
            color: #000;
            margin: 0 10px;          /* Petite marge pour ne pas coller aux logos */
        }

        /* Style unique pour les deux logos */
        .card-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;      /* Évite de déformer vos logos s'ils ne sont pas parfaitement carrés */
        }

        /* Votre zone principale reste inchangée */
        .card-body {
            display: flex;
            flex: 1;
            gap: 10px;
            position: relative;
            z-index: 2;
        }
        /* Zone principale existante */
        .card-body {
            display: flex;
            flex: 1;
            gap: 10px;
            position: relative; /* Force le contenu à passer au-dessus du logo */
            z-index: 2;
        }

        /* Styles pour le logo en arrière-plan centré */
        .card-background-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 75%; /* Ajustez la taille du logo ici selon le rendu souhaité */
            max-width: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1; /* Reste derrière le texte (.card-body) */
            pointer-events: none; /* Évite toute interférence avec le curseur */
        }

        .card-background-logo img {
            width: 100%;
            height: auto;
            opacity: 0.10; /* Gère la transparence : 0.10 = 10% visible pour garder le texte lisible */
        }

        /* Tableau des informations (gauche) */
        .info-table {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            font-size: 8.5pt;
            line-height: 1.3;
            min-height: 18px;
        }

        .info-row.bold-label .label {
            font-weight: bold;
        }

        .info-row .label {
            width: 165px;
            min-width: 165px;
            color: #000;
            font-size: 8.5pt;
        }

        .info-row .value {
            flex: 1;
            font-weight: bold;
            color: #000;
            font-size: 8.5pt;
        }

        /* Séparateur léger entre certains groupes */
        .row-spacer {
            height: 6px;
        }

        /* Numéro d'immatriculation en rouge */
        .immat-number {
            color: #cc0000;
            font-weight: bold;
            font-size: 10pt;
        }

        /* Téléphone en rouge */
        .phone-red {
            color: #cc0000;
            font-weight: bold;
        }

        /* Zone photo + QR (droite) */
        .card-right {
            width: 190px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            padding-top: 4px;
        }

        .photo-box {
            width: 135px;
            height: 165px;
            border: 1.5px solid #888;
            background: #f0f0f0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* L'image s'adapte sans être coupée ni déformée */
            object-position: center; /* Centre l'image s'il y a des espaces vides */
        }

        .qr-box {
            width: 90px;
            height: 90px;
            border: 1px solid #ccc;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Zone basse : téléphone + immatriculation */
        .card-footer {
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-top: 1px solid #ddd;
            padding-top: 6px;
        }

        .footer-left {
            font-size: 8.5pt;
        }

        .footer-right {
            font-size: 8.5pt;
            text-align: right;
        }

        /* ══════════════════ VERSO ══════════════════ */
        .cardb {
            width: 680px;
            height: 380px;
            background: #ffffff;
            border: 1px solid #ccc;
            overflow: hidden;
            page-break-after: always;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        /* En-tête du verso */
        .verso-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px 8px 20px;
            border-bottom: 2px solid #ccc;
        }

        .verso-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .verso-org-name {
            flex: 1;
            text-align: center;
            padding: 0 16px;
        }

        .verso-org-name h1 {
            font-size: 12pt;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.3;
            color: #000;
        }

        .verso-coa {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        /* Corps du verso */
        .verso-body {
            flex: 1;
            padding: 14px 28px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .verso-address {
            display: flex;
            justify-content: space-between;
            font-size: 8.5pt;
            color: #222;
            line-height: 1.8;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .verso-address-left p,
        .verso-address-right p {
            margin: 0;
        }

        /* Signature + conditions */
        .verso-signature-area {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            flex: 1;
        }

        .signature-wrapper {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stamp-area {
            width: 160px;
            height: 80px;
            border: 1px dashed #bbb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 4px;
            position: relative;
        }

        .stamp-area img {
            max-width: 150px;
            max-height: 75px;
            object-fit: contain;
        }

        .president-name {
            font-size: 8.5pt;
            font-weight: bold;
            text-decoration: underline;
            color: #000;
            margin-top: 3px;
        }

        /* Barre du drapeau du Bénin */
        .benin-flag {
            height: 14px;
            display: flex;
            margin-top: auto;
        }

        .flag-green {
            width: 33.33%;
            background: #008751;
        }

        .flag-yellow {
            width: 33.33%;
            background: #FCD116;
        }

        .flag-red {
            width: 33.34%;
            background: #E8112D;
        }

        /* Conditions texte */
        .verso-conditions {
            font-size: 7.5pt;
            color: #444;
            text-align: center;
            line-height: 1.5;
            margin: 6px 30px;
        }

        .verso-conditions strong {
            color: #cc0000;
        }
    </style>
</head>
<body>

    @php $previewHtml = $previewHtml ?? false; @endphp

    <!-- ══════════════════ RECTO ══════════════════ -->
    <div class="card">
        <!-- Logo en filigrane au centre pour le fond -->
            <div class="card-background-logo">
                <!-- Remplacez le chemin 'logo-anoper.png' par votre logique Blade si nécessaire -->
                <img src="{{ asset('assets/beef.jpeg') }}" alt="Logo udoper Fond">
            </div>

        <!--div class="card-title">CARTE DE MEMBRE ANOPER BENIN
            <p style="font-size: 9pt; margin-top:4px; color: rgb(8, 109, 57); text-decoration: none;">UDOPER ATACORA-DONGA</p>

        </div-->
        <div class="card-header-container">
            <!-- Logo Gauche -->
            <img src="{{ $previewHtml ? asset('assets/logo-udoper-ad.png') : public_path('assets/logo-udoper-ad.png') }}"
             alt="Logo Gauche" class="card-logo">

            <!-- Bloc Titre Central -->
            <div class="card-title">
                CARTE DE MEMBRE ANOPER BENIN
                <p style="font-size: 9pt; margin-top:4px; color: rgb(8, 109, 57); text-decoration: none; font-weight: normal; font-style: normal;">
                    UDOPER ATACORA-DONGA
                </p>
            </div>

            <!-- Logo Droite -->
            <img src="{{ $previewHtml ? asset('assets/logoa.jpg') : public_path('assets/logoa.jpg') }}"
             alt="Logo Droite" class="card-logo">
        </div>

        <div class="card-body">
            <!-- Informations de l'éleveur -->
            <div class="info-table">

                <div class="info-row">
                    <span class="label">Nom</span>
                    <span class="value">{{ $breeder->last_name }}</span>
                </div>

                <div class="info-row">
                    <span class="label">Prénom</span>
                    <span class="value">{{ $breeder->first_name }}</span>
                </div>

                <div class="info-row" style="min-height:28px;">
                    <span class="label" style="font-weight:bold;">Date et Lieu<br>de Naissance</span>
                    <span class="value">
                        {{ $breeder->date_of_birth ? \Carbon\Carbon::parse($breeder->date_of_birth)->format('d/m/Y') : '—' }}
                        à {{ $breeder->place_of_birth ?? '—' }}
                    </span>
                </div>
                <div class="info-row">
                    <span class="label">Sexe</span>
                    <span class="value">{{ $breeder->gender ?? '—' }}</span>
                </div>

                <div class="row-spacer"></div>
                <div class="info-row">
                    <span class="label">Département</span>
                    <span class="value">{{ $breeder->department ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Commune / UCOPER</span>
                    <span class="value">{{ $breeder->city ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Arrondissement / UAGPER</span>
                    <span class="value">{{ $breeder->borough ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Village ou Qtier / GPER</span>
                    <span class="value">{{ $breeder->neighborhood ?? '—' }}</span>
                </div>
                <!--div class="info-row">
                    <span class="label">UCOPER</span>
                    <span class="value">{{ $breeder->organization ?? '—' }}</span>
                </div-->

                <div class="row-spacer"></div>

                <div class="info-row">
                    <span class="label">Date d'adhésion :</span>
                    <span class="value">{{ $breeder->id_issued_date ? \Carbon\Carbon::parse($breeder->id_issued_date)->format('d/m/Y') : '—' }}</span>
                </div>

                <!--div class="info-row">
                    <span class="label">Date enr. :</span>
                    <span class="value">{{ $breeder->id_expiration_date ? \Carbon\Carbon::parse($breeder->id_expiration_date)->format('d/m/Y') : '—' }}</span>
                </div-->
                <div class="info-row">
                    <span class="label">Délivrance :</span>
                      <span style="color:#E8112D!important; font-weight:bold;">{{ $breeder->id_issued_date ? \Carbon\Carbon::parse($breeder->id_issued_date)->format('d/m/Y') : '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Expriration :</span>
                      <span style="color:#E8112D!important; font-weight:bold;">{{ $breeder->id_expiration_date ? \Carbon\Carbon::parse($breeder->id_expiration_date)->format('d/m/Y') : '—' }}</span>
                </div>
            </div>

            <!-- Photo + QR Code -->
            <div class="card-right">
                <!-- Photo d'identité -->
                <div class="photo-box">
                    @if($breeder->id_photo)
                        <img src="{{ $previewHtml ? asset('storage/' . $breeder->id_photo) : public_path('storage/' . $breeder->id_photo) }}" alt="Photo">
                    @endif
                </div>

                <div style="width:100%; display:flex; flex-direction:row; align-items:center; gap:6px;">
                    <!-- QR Code -->
                    <div class="qr-box">
                        <img src="{{ \App\Helpers\QrCodeHelper::generateBreederQrCode($breeder) }}" alt="QR Code">
                    </div>


                    <!-- signature -->
                    <div class="sign-b  ox">
                        <span style="font-size: 8.5pt; font-align: center; ">Signature</span>
                                        @if($breeder->signature_photo)
                            <div class="signature-photo">
                                <img src="{{ $previewHtml ? asset('storage/' . $breeder->signature_photo) : public_path('storage/' . $breeder->signature_photo) }}" alt="Signature">
                            </div>
                        @else
                            <div class="signature-photo"></div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <!-- Pied de carte : Téléphone + Immatriculation -->
        <div class="card-footer">
            <div class="footer-left">
                Téléphone : <span class="phone-red">{{ $breeder->contact ?? '—' }}</span>
            </div>
            <div class="footer-right">
                Immatriculat° N° : <span class="immat-number">{{ $breeder->breeder_number ?? '—' }}</span>
            </div>
        </div>

    </div>


    <!-- ══════════════════ VERSO ══════════════════ -->
    <div class="cardb">
                    <div class="card-background-logo">
                <!-- Remplacez le chemin 'logo-anoper.png' par votre logique Blade si nécessaire -->
                <img src="{{ asset('assets/fromx.jpeg') }}" alt="Logo udoper Fond">
            </div>
        <!-- En-tête avec logos -->
        <div class="verso-header">
            <!-- Logo UDOPER -->
            <img src="{{ $previewHtml ? asset('assets/logo-udoper-ad.png') : public_path('assets/logo-udoper-ad.png') }}"
                 class="verso-logo" alt="Logo UDOPER"
                 onerror="this.style.display='none'">

            <!-- Nom de l'organisation -->
            <div class="verso-org-name">
                <p style="font-size: 7pt; color: rgb(56, 54, 54);"><span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">A</span>SSOCIATION <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">N</span>ATIONALE DES <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">O</span>RGANISATIONS <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">P</span>ROFESSIONNELLES <br>D'<span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">E</span>LEVEURS DE <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">R</span>UMINANTS DU BENIN</span></p>
                <h1  style="color: #086D39;">ANOPER - BENIN</h1>
                <p style="font-size: 7pt; color: rgb(56, 54, 54);"><span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">U</span>NION <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">D</span>EPARTEMENTALE DES <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">O</span>RGANISATIONS <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">P</span>ROFESSIONNELLES <br>D'<span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">E</span>LEVEURS DE <span style="color: #086D39; font-weight: bold; font-size: 8pt !important;">R</span>UMINANTS DU BENIN</p>
                <h1  style="color: #086D39;"> UDOPER ATACORA-DONGA </h1>
            </div>

            <!-- Armoiries du Bénin benin-coa.webp -->
            <img src="{{ $previewHtml ? asset('assets/logoa.jpg') : public_path('assets/logoa.jpg') }}"
                 class="verso-coa" alt="Armoiries Bénin"
                 onerror="this.style.display='none'">
        </div>

        <!-- Corps -->
        <div class="verso-body">

            <!-- Coordonnées -->
            <div class="verso-address">
                <div class="verso-address-left">
                    <p>BP 266, Sassirou / Djougou – République du Bénin</p>
                    <p>Tél. +229 01 52 88 02 60</p>
                </div>
                <div class="verso-address-right">
                    <p>Email : udoperad@yahoo.fr</p>
                    <p>Site web : www.udoperad.bj</p>
                </div>
            </div>

            <!-- Conditions d'utilisation -->
            <div class="verso-conditions">
                <p>Cette carte est strictement personnelle. Le titulaire s'engage à respecter les statuts et règlements de l'Association.<br>
                En cas de perte ou de vol, informez immédiatement le secrétariat de l'UDOPER-AD.</p>
            </div>

            <!-- Signature du Président -->
            <div class="verso-signature-area">
                <div class="signature-wrapper">
                    <div class="stamp-area">
                        @if(isset($issuer_signature_path) && $issuer_signature_path)
                            <img src="{{ $previewHtml ? asset('storage/' . $issuer_signature_path) : public_path('storage/' . $issuer_signature_path) }}" alt="Cachet et Signature">
                        @else
                         <img src="{{ $previewHtml ? asset('assets/signed.svg') : public_path('assets/signed.svg') }}" alt="Cachet et Signature">
                        @endif
                    </div>
                    <div class="president-name">Aboubakar ALFA TIDJANI</div>
                </div>
            </div>

        </div>

        <!-- Barre drapeau du Bénin -->
        <div class="benin-flag">
            <div class="flag-green"></div>
            <div class="flag-yellow"></div>
            <div class="flag-red"></div>
        </div>

    </div>

</body>
</html>
