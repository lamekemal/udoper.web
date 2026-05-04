
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carte Éleveur - {{ $breeder->full_name }}</title>
    <style>
        @page {
            size: 85.6mm 54mm;
            margin: 0;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background: #fff;
            -webkit-print-color-adjust: exact;
        }
        
        .card {
            width: 85.6mm;
            height: 54mm;
            position: relative;
            overflow: hidden;
            page-break-after: always;
        }

        /* --- RECTO --- */
        .recto {
            background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
            border: 1px solid #1a4a8e;
        }
        
        .blue-stripe {
            height: 3mm;
            background-color: #1a4a8e;
            width: 100%;
        }

        .header {
            display: table;
            width: 100%;
            padding: 2mm 3mm;
            border-bottom: 0.5pt solid #1a4a8e;
        }

        .header-logo {
            display: table-cell;
            width: 12mm;
            vertical-align: middle;
        }

        .header-logo img {
            width: 11mm;
            height: 11mm;
        }

        .header-text {
            display: table-cell;
            vertical-align: middle;
            padding-left: 2mm;
        }

        .title-main {
            font-size: 8pt;
            font-weight: bold;
            color: #1a4a8e;
            text-transform: uppercase;
        }

        .title-sub {
            font-size: 5pt;
            color: #333;
            line-height: 1.1;
        }

        .main-body {
            display: table;
            width: 100%;
            padding: 2mm 3mm;
        }

        .photo-side {
            display: table-cell;
            width: 22mm;
            vertical-align: top;
        }

        .id-photo {
            width: 21mm;
            height: 26mm;
            border: 0.5pt solid #1a4a8e;
            object-fit: cover;
            background: #f0f0f0;
        }

        .info-side {
            display: table-cell;
            vertical-align: top;
            padding-left: 3mm;
        }

        .data-row {
            margin-bottom: 1.2mm;
            font-size: 7pt;
        }

        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 18mm;
        }

        .value {
            font-weight: bold;
            color: #000;
        }

        .footer-recto {
            position: absolute;
            bottom: 2mm;
            width: 100%;
            padding: 0 3mm;
        }

        .immatriculation {
            font-size: 8pt;
            color: #d32f2f;
            font-weight: bold;
            float: left;
        }

        .qr-code {
            float: right;
            width: 10mm;
            height: 10mm;
            background: #000; /* Placeholder pour le QR */
        }

        /* --- VERSO --- */
        .verso {
            background: #fff;
            border: 1px solid #1a4a8e;
            padding: 4mm;
            text-align: center;
        }

        .verso-content {
            font-size: 6.5pt;
            text-align: justify;
            line-height: 1.3;
            color: #222;
        }

        .authority-section {
            margin-top: 4mm;
            text-align: right;
        }

        .authority-title {
            font-size: 7pt;
            font-weight: bold;
            margin-bottom: 1mm;
        }

        .stamp-signature {
            height: 18mm;
            width: 40mm;
            object-fit: contain;
            margin-left: auto;
        }

        .flag-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2.5mm;
            display: table;
            table-layout: fixed;
        }

        .flag-cell { display: table-cell; }
        .green { background: #008751; }
        .yellow { background: #fcd116; }
        .red { background: #e8112d; }

    </style>
</head>
<body>
    <!-- RECTO -->
    <div class="card recto">
        <div class="blue-stripe"></div>
        <div class="header">
            <div class="header-logo">
                <img src="{{ public_path('images/logo-udoper-ad.jpg') }}" alt="Logo">
            </div>
            <div class="header-text">
                <div class="title-main">CARTE DE MEMBRE - UDOPER-AD</div>
                <div class="title-sub">Union Départementale des Organisations Professionnelles d'Eleveurs de Ruminants Atacora Donga</div>
            </div>
        </div>
        
        <div class="main-body">
            <div class="photo-side">
                @if($breeder->id_photo)
                    <img src="{{ public_path('storage/' . $breeder->id_photo) }}" class="id-photo">
                @else
                    <div class="id-photo" style="display:flex; align-items:center; justify-content:center; font-size:5pt;">PHOTO</div>
                @endif
            </div>
            <div class="info-side">
                <div class="data-row"><span class="label">Nom:</span> <span class="value">{{ $breeder->last_name }}</span></div>
                <div class="data-row"><span class="label">Prénom:</span> <span class="value">{{ $breeder->first_name }}</span></div>
                <div class="data-row">
                    <span class="label">Né(e) le:</span> 
                    <span class="value">{{ $breeder->date_of_birth ? \Carbon\Carbon::parse($breeder->date_of_birth)->format('d/m/Y') : '—' }}</span>
                </div>
                <div class="data-row"><span class="label">Commune:</span> <span class="value">{{ $breeder->city }}</span></div>
                <div class="data-row"><span class="label">Village:</span> <span class="value">{{ $breeder->neighborhood }}</span></div>
                <div class="data-row"><span class="label">Téléphone:</span> <span class="value">{{ $breeder->contact }}</span></div>
            </div>
        </div>

        <div class="footer-recto">
            <div class="immatriculation">№: {{ $breeder->breeder_number }}</div>
            {{-- Si vous utilisez un package QR code type simple-qrcode --}}
            {{-- <div class="qr-code"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(50)->generate($breeder->breeder_number)) !!} "></div> --}}
        </div>
    </div>

    <!-- VERSO -->
    <div class="card verso">
        <div class="verso-content">
            <p style="text-align:center; font-weight:bold; text-decoration:underline; margin-bottom:2mm;">CONDITIONS D'UTILISATION</p>
            Cette carte est la propriété de l'UDOPER Atacora Donga. Elle est strictement personnelle et ne peut être cédée. 
            Le titulaire s'engage à respecter les statuts et règlement intérieur de l'Union. 
            En cas de perte, le titulaire est tenu d'en informer immédiatement le secrétariat de l'organisation.
            <br><br>
            <strong>Siège :</strong> Djougou, République du Bénin.
            <br>
            <strong>Délivrée le :</strong> {{ $breeder->id_issued_date ? \Carbon\Carbon::parse($breeder->id_issued_date)->format('d/m/Y') : '—' }}
        </div>

        <div class="authority-section">
            <div class="authority-title">Le Président,</div>
            {{-- Image changeable pour signature et cachet --}}
            @if(isset($issuer_signature_path))
                <img src="{{ public_path('storage/' . $issuer_signature_path) }}" class="stamp-signature">
            @else
                <div style="height:18mm;"></div>
            @endif
            <div style="font-size:7pt; font-weight:bold;">Aboubakar ALFA TIDJANI</div>
        </div>

        <div class="flag-bar">
            <div class="flag-cell green"></div>
            <div class="flag-cell yellow"></div>
            <div class="flag-cell red"></div>
        </div>
    </div>
</body>
</html>
