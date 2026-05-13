<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pièce d'Identité - {{ $breeder->full_name }}</title>
    <!--link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet"/>-->
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
            font-family: 'Helvetica', Arial, sans-serif;
            background: #fff;
            -webkit-print-color-adjust: exact;
        }

        /* ── Card shell ── */
        .card {
            width: 680px;
            height: 380px;
            /*border-radius: 14px;*/
            overflow: hidden;
            display: flex;
            position: relative;
            page-break-after: always;
        }

        /* ══════════════════ LEFT PANEL ══════════════════ */
        .left {
            flex: 1;
            background: #ffffff;
            padding: 40px 44px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            z-index: 2;
        }

            /* Decorative corner circles (subtle grey, like the template) */
            .left::before,
            .left::after {
                content: '';
                position: absolute;
                border-radius: 50%;
                background: #ebebeb;
            }

            .left::before {
                width: 130px;
                height: 130px;
                top: -50px;
                left: -50px;
            }

            .left::after {
                width: 90px;
                height: 90px;
                bottom: -35px;
                right: 30px;
            }

        /* Name block */
        .name-block {
            position: relative;
            z-index: 1;
        }

        .name {
            font-size: 2rem;
            color: #2b2d33;
            line-height: 1.1;
            letter-spacing: -0.5px;
        }

            .name strong {
                font-weight: 700;
            }

        .title {
            margin-top: 6px;
            font-size: .85rem;
            color: #555;
            font-weight: 600;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .divider {
            width: 52px;
            height: 2.5px;
            background: #e05039;
            margin-top: 10px;
            border-radius: 2px;
        }

        /* Contact list */
        .contacts {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
            position: relative;
            z-index: 1;
        }

            .contacts li {
                display: flex;
                align-items: center;
                gap: 12px;
                font-size: .82rem;
                color: #444;
            }

        .icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            fill: #e05039;
        }

        /* ══════════════════ RIGHT PANEL ══════════════════ */
        .right {
            width: 260px;
            background: #2b2d33;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

            /* Blue curved accent strip */
            .right::before {
                content: '';
                position: absolute;
                left: -30px;
                top: 0;
                bottom: 0;
                width: 56px;
                background: #e05039;
                /*border-radius: 0 50px 50px 0;*/
            }

            /* Top-right grey decorative circle */
            .right::after {
                content: '';
                position: absolute;
                width: 120px;
                height: 120px;
                border-radius: 50%;
                background: rgba(255,255,255,.05);
                top: -40px;
                right: -40px;
            }

        .brand {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        /* Logo mark (SVG inline) */
        .logo-mark {
            width: 68px;
            height: 68px;
            margin: 0 auto 14px;
            display: block;
        }

        .brand-name {
            font-size: 1.25rem;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 400;
        }

            .brand-name strong {
                font-weight: 700;
            }

                    .brand-namex {
            font-size: 1rem;
            color: #ffffff;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 400;
        }

            .brand-namex strong {
                font-weight: 700;
            }

        .tagline {
            margin-top: 4px;
            font-size: .72rem;
            color: #aaa;
            letter-spacing: 1px;
        }
        /*===============card2============*/
        /* ── Card shell ── */
        .cardb {
            width: 680px;
            height: 380px;
            /*border-radius: 14px;*/
            overflow: hidden;
            display: flex;
            position: relative;
            page-break-after: always;
            background: #ffffff;
            align-items: center;
            justify-content: center;
        }

        /* Top-left dark corner block */
        .corner-tlb {
            position: absolute;
            top: -28px;
            left: -28px;
            width: 175px;
            height: 140px;
            background: #2b2d33;
            border-radius: 18px;
            transform: rotate(-8deg);
        }
            /* grey border behind it */
            .corner-tlb::before {
                content: '';
                position: absolute;
                inset: -8px;
                background: #d0d0d0;
                border-radius: 22px;
                z-index: -1;
            }

        /* Bottom-right dark corner block */
        .corner-brb {
            position: absolute;
            bottom: -28px;
            right: -28px;
            width: 175px;
            height: 140px;
            background: #2b2d33;
            border-radius: 18px;
            transform: rotate(-8deg);
        }

            .corner-brb::before {
                content: '';
                position: absolute;
                inset: -8px;
                background: #d0d0d0;
                border-radius: 22px;
                z-index: -1;
            }

        /* ── Centre brand block ── */
        .brandb {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        /* Logo SVG */
        .logo-markb {
            width: 90px;
            height: 90px;
            display: block;
            margin: 0 auto 16px;
        }

        .brand-nameb {
            font-size: 1.7rem;
            color: #2b2d33;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 400;
        }

            .brand-nameb strong {
                font-weight: 700;
            }

        .taglineb {
            margin-top: 5px;
            font-size: .95rem;
            color: #777;
            letter-spacing: .5px;
        }

        .photo-container {
            width: 25mm;  /* Utilisez des mm partout pour la cohérence */
            height: 30mm;
            border: 1pt solid #e05039;
            background: #f8f8f8;
            overflow: hidden; /* Empêche l'image de dépasser */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Important : remplit le cadre sans déformer l'image */
        }
                /* 3. Style des deux colonnes */
        .colonne {
            flex: 1; /* Chaque colonne prend la moitié de l'espace (50/50) */
            padding: 5px;
            /*
            display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          */
        }
        /* La colonne de droite devient un conteneur flexible */
        .col-signature {
            display: flex;
            flex-direction: column;
            justify-content: flex-end; /* Pousse le contenu vers le bas de la colonne */
            align-items: center;       /* Centre horizontalement la signature et les dates */
            font-size: 6pt;
            font-weight: bold;
            padding-bottom: 5mm;       /* Marge de sécurité avec le bord du div */
        }

        /* Groupe contenant la signature + les dates */
        .bottom-group {
            text-align: center;
            width: 100%;
            z-index: 5; /* Assure que ce groupe est au-dessus des autres éléments de la colonne */
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

        /* Style des textes de dates */
        .date-info {
            color: #e05039;
            line-height: 1.2;
        }

        .date-info span {
            display: inline-block;
        }
                    /* Conteneur principal du verso */
            .verso-container {
                width: 100%;
                height: 100%;
                padding: 40px 50px; /* Marges pour éviter les coins noirs */
                display: flex;
                flex-direction: column;
                justify-content: space-between; /* Pousse les blocs aux extrémités */
                position: relative;
                z-index: 10;
            }

            /* Texte des conditions */
            .conditions-block {
                margin-left: 30mm; /* Décalage pour éviter le coin noir */
                margin-right: 30mm; /* Décalage pour éviter le coin noir */
                text-align: center;
                font-size: 8pt;
                color: #444;
                line-height: 1.4;
            }

            .siege {
                margin-top: 5px;
                font-size: 7pt;
                color: #e05039; /* Rappel de la couleur primaire */
            }

            /* Bloc Autorité poussé en bas à droite */
            .authority-block {
                display: flex;
                justify-content: center; /* Aligne la signature à droite */
                align-items: flex-end; /* Aligne la signature en bas */
                width: 100%;
                margin-bottom: 5mm;      /* Marge de sécurité avec le bas de la carte */
            }

            .signature-wrapper {
            text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 40mm; /* Largeur fixe pour centrer le titre par rapport à la photo */
            }

            .title-authority {
            font-size: 7pt;
                font-weight: bold;
                text-transform: uppercase;
                color: #2b2d33;
                margin-bottom: 1mm;
                border-bottom: 0.5pt solid #e05039; /* Petite ligne décorative sous "Le Président" */
                padding-bottom: 2px;
            }

            /* Image de la signature du président */
            .issuer-signature {
                width: 35mm;
                height: 15mm;
                object-fit: contain; /* Garde les proportions sans déformer */
                filter: multiply(1.1); /* Optionnel : pour mieux fondre la signature si fond blanc */
            }

            .signature-spacer {
                height: 18mm;
            }
    </style>
</head>
<body>

    @php $previewHtml = $previewHtml ?? false; @endphp

    <div class="card">

        <!-- ── LEFT ── -->
        <div class="left">
            <div class="name-block">
                <div class="name"><strong>{{ $breeder->last_name }}</strong> {{ $breeder->first_name }}</div>
                <div class="title">Membre  {{ $breeder->organization ?? '—' }} </div>
                <div class="divider"></div>
                <div style="display: flex; gap: 12px; align-items: flex-start;">
                    <!-- QR Code -->
                    <div class="photo-container">
                        <img src="{{ \App\Helpers\QrCodeHelper::generateBreederQrCode($breeder) }}" alt="QR Code VCF">
                    </div>
                    <!-- Photo d'identité -->
                    @if($breeder->id_photo)
                    <div class="photo-container">
                        <img src="{{ $previewHtml ? asset('storage/' . $breeder->id_photo) : public_path('storage/' . $breeder->id_photo) }}" alt="Photo">
                    </div>
                    @else
                    <div class="photo-container">
                        <div></div>
                    </div>
                    @endif
                </div>
            </div>
        <div style="display: flex; height: 100%; min-height: 150px;"> <!-- Ajustez la hauteur selon votre besoin -->
            <!-- Colonne Gauche (Contacts / Adresse) -->
            <ul class="colonne contacts">
                            <li>
                        <!-- Phone -->
                        <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" />
                        </svg>
                        {{ $breeder->contact }}
                    </li>
                    <li>
                        <!-- Email -->
                        <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        {{ $breeder->email ?? '—' }}
                    </li>
                    <li>
                        <!-- Address -->
                        <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                        </svg>
                        <div class="info-list">
                            <div class="info-item"><span class="label">Né le:</span> {{ $breeder->date_of_birth ? \Carbon\Carbon::parse($breeder->date_of_birth)->format('d/m/Y') : '—' }} / à  {{ $breeder->place_of_birth ?? '—' }}</div>
                            <div class="info-item"><span class="label">Commune:</span> {{ $breeder->borough }}, {{ $breeder->city }}</div>
                            <div class="info-item"><span class="label">Village:</span> {{ $breeder->neighborhood }}</div>
                        </div>
                    </li>
            </ul>

            <!-- Colonne Droite (Signature et Dates) -->
            <div class="colonne col-signature">
                <div class="bottom-group">
                    @if($breeder->signature_photo)
                        <div class="signature-photo">
                            <img src="{{ $previewHtml ? asset('storage/' . $breeder->signature_photo) : public_path('storage/' . $breeder->signature_photo) }}" alt="Signature">
                        </div>
                    @else
                        <div class="signature-photo"></div>
                    @endif

                    <div class="date-info">
                        <div>
                            <span>Délivrance</span>
                            <span>{{ $breeder->id_issued_date ? \Carbon\Carbon::parse($breeder->id_issued_date)->format('d/m/Y') : '—' }}</span>
                        </div>
                        <div>
                            <span>Expiration</span>
                            <span>{{ $breeder->id_expiration_date ? \Carbon\Carbon::parse($breeder->id_expiration_date)->format('d/m/Y') : '—' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <!-- ── RIGHT ── -->
        <div class="right">
            <div class="brand">
                <!-- Logo SVG -->
                <img src="{{ $previewHtml ? asset('assets/logo-udoper-ad.png') : public_path('assets/logo-udoper-ad.png') }}" class="logo-mark">

                <div class="brand-namex"><strong>ANOPER</strong> BENIN</div>
                <div class="tagline">UDOPER Atacora Donga </div>
                <div class="tagline">Eleveur N° : {{ $breeder->breeder_number }} </div>
            </div>
        </div>

    </div>


        <div class="cardb">
            <!-- Coins décoratifs -->
            <div class="corner-tlb"></div>
            <div class="corner-brb"></div>

            <!-- Contenu principal -->
            <div class="verso-container">
                
                <!-- Bloc des textes (Haut) -->
                <div class="conditions-block">
                    <p>Cette carte est strictement personnelle. Le titulaire s'engage à respecter les statuts de l'Union. En cas de perte, informez immédiatement le secrétariat.</p>
                    <p class="siege"><strong>Siège :</strong> Djougou, République du Bénin.</p>
                </div>

                <!-- Bloc Signature Autorité (Bas) -->
                <div class="authority-block">
                    <div class="signature-wrapper">
                        <div class="title-authority">Le Président</div>
                        
                        @if(isset($issuer_signature_path) && $issuer_signature_path)
                            <img src="{{ $previewHtml ? asset('storage/' . $issuer_signature_path) : public_path('storage/' . $issuer_signature_path) }}" class="issuer-signature">
                        @else
                            <div class="signature-spacer"></div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
</body>
</html>
